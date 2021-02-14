<?php namespace Saeedmou\Subtitles;

interface SubtitleContract {

    public static function convert($from_file_path, $to_file_path);
    public static function convertFileToUTF8($from_file_path, $to_file_path);
    public static function convertSubtitleFileToUTF8($from_file_path, $to_file_path);

    public static function load($file_name_or_file_content, $extension = null); // load file
    public static function loadUTF8Converted($file_name_or_file_content, $extension = null);
    public function save($file_name); // save file
    public function content($format); // output file content (instead of saving to file)

    public function add($start, $end, $text); // add one line or several
    public function remove($from, $till); // delete text from subtitles
    public function shiftTime($seconds, $from = 0, $till = null); // add or subtract some amount of seconds from all times
    public function shiftTimeGradually($seconds_to_shift, $from = 0, $till = null);

    public function removeAllTags();
    public function removeSpecialCharacters();
    public function removeBlacklistWords($blacklistArray);
    public function convertCharacters($key);

    

    public function getInternalFormat();
    public function setInternalFormat(array $internal_format);
}


class Subtitles implements SubtitleContract {

    protected $input;
    protected $input_format;

    protected $internal_format; // data in internal format (when file is converted)

    protected $converter;
    protected $output;

    public static function convert($from_file_path, $to_file_path)
    {
       return static::load($from_file_path)->save($to_file_path);
    }

    public static function convertSubtitleFileToUTF8($from_file_path, $to_file_path)
    {
       return static::loadUTF8Converted($from_file_path, $extension = null)->save($to_file_path);
    }

    public static function convertFileToUTF8($from_file_path, $to_file_path)
    {
        if (!file_exists($from_file_path)) {
            throw new \Exception("file doesn't exist: " . $from_file_path);
        }
        $myfile = fopen($from_file_path, "r") ;
        $t = fread($myfile, filesize($from_file_path));
        fclose($myfile);
        $encoding = StringLib::str_detect_encoding($t);

        if (!mb_detect_encoding($t, 'UTF-8', true)) {
            $o = iconv($encoding, "UTF-8", $t);
        }else{
            $o = $t;
        }

        $fp = fopen($to_file_path, "w");// $o = iconv('WINDOWS-1256', "UTF-8", $t);// $o = iconv('CP1256', "UTF-8", $t);
        fwrite($fp, $o);
        fclose($fp);
        return  static::load($to_file_path);
    }

    public static function load($file_name_or_file_content, $extension = null)
    {
        if (file_exists($file_name_or_file_content)) {
            return static::loadFile($file_name_or_file_content);
        }

        return static::loadString($file_name_or_file_content, $extension);
    }

    public static function loadUTF8Converted($file_name_or_file_content, $extension = null)
    {
        if (file_exists($file_name_or_file_content)) {
            $string = file_get_contents($file_name_or_file_content);
        }
        else{
            $string=$file_name_or_file_content;
        }

        $string=static::convertToUTF8IfNeeded($string);

        if (!$extension) {
            $extension = Helpers::fileExtension($file_name_or_file_content);
        }

        return static::loadString($string, $extension);
    }

    private static function convertToUTF8IfNeeded(string $string): string{
        $encoding = StringLib::str_detect_encoding($string);
        if (!mb_detect_encoding($string, 'UTF-8', true)) {
            $string = iconv($encoding, "UTF-8", $string);
        }
        return $string;
    }

    public function save($path)
    {
        $file_extension = Helpers::fileExtension($path);
        $content = $this->content($file_extension);

        // file_put_contents($path, $content);
        $fp = fopen($path, "w");// $o = iconv('WINDOWS-1256', "UTF-8", $t);// $o = iconv('CP1256', "UTF-8", $t);
        fwrite($fp, $content);
        fclose($fp);

        return $this;
    }

    public function add($start, $end, $text)
    {
        // @TODO validation
        // @TODO check subtitles to not overlap
        $this->internal_format[] = [
            'start' => $start,
            'end' => $end,
            'lines' => is_array($text) ? $text : [$text],
        ];

        $this->sortInternalFormat();

        return $this;
    }

    public function remove($from, $till)
    {
        foreach ($this->internal_format as $k => $block) {
            if ($this->shouldBlockBeRemoved($block, $from, $till)) {
                unset($this->internal_format[$k]);
            }
        }

        $this->internal_format = array_values($this->internal_format); // reorder keys

        return $this;
    }

    public function shiftTime($seconds, $from = 0, $till = null)
    {
        foreach ($this->internal_format as &$block) {
            if (!Helpers::shouldBlockTimeBeShifted($from, $till, $block['start'], $block['end'])) {
                continue;
            }

            $block['start'] += $seconds;
            $block['end'] += $seconds;
        }
        unset($block);

        $this->sortInternalFormat();

        return $this;
    }

    public function shiftTimeGradually($seconds, $from = 0, $till = null)
    {
        if ($till === null) {
            $till = $this->maxTime();
        }

        foreach ($this->internal_format as &$block) {
            $block = Helpers::shiftBlockTime($block, $seconds, $from, $till);
        }
        unset($block);

        $this->sortInternalFormat();

        return $this;
    }

    public function content($format)
    {
        $format = strtolower(trim($format, '.'));

        $converter = Helpers::getConverter($format);
        $content = $converter->internalFormatToFileContent($this->internal_format);

        return $content;
    }

    // for testing only
    public function getInternalFormat()
    {
        return $this->internal_format;
    }

    // for testing only
    public function setInternalFormat(array $internal_format)
    {
        $this->internal_format = $internal_format;

        return $this;
    }

    /**
     * @deprecated  Use shiftTime() instead
     */
    public function time($seconds, $from = null, $till = null)
    {
        return $this->shiftTime($seconds, $from, $till);
    }


    public function removeAllTags()
    {
        foreach ($this->internal_format as &$block) {
            // $block['lines'] = strip_tags($block['lines']);
            if (is_array($block['lines'])){
                $specialSymb="sp#^nl%";
                $tmp=implode($specialSymb,$block['lines']);
                $tmp_stripped = strip_tags($tmp);
                $block['lines']=explode($specialSymb,$tmp_stripped);
            }else{
                $block['lines'] = strip_tags($block['lines']);
            }
            // var_dump($block['lines']);
        }
        unset($block);

        $this->sortInternalFormat();

        return $this;

    }

    public function removeSpecialCharacters()
    {
        foreach ($this->internal_format as &$block) {
            // $block['lines'] = strip_tags($block['lines']);
            if (is_array($block['lines'])){
                $specialSymb="sp#^nl%";
                $tmp=implode($specialSymb,$block['lines']);
                $tmp_stripped = str_replace(["♪"],"",$tmp);
                $block['lines']=explode($specialSymb,$tmp_stripped);
            }else{
                $block['lines'] = strip_tags($block['lines']);
            }
            // var_dump($block['lines']);
        }
        unset($block);

        $this->sortInternalFormat();

        return $this;

    }

    public function removeBlacklistWords($blacklistArray)
    {
        for ($i=0; $i <count($this->internal_format) ; $i++) { 
            $block=&$this->internal_format[$i];
            if (is_array($block['lines'])){
                $specialSymb="sp#^nl%";
                $tmp=implode($specialSymb,$block['lines']);
            }else{
                $tmp = $block['lines'];
            }
            $tmp=strtolower($tmp);
            foreach ($blacklistArray as  $word) {
                if(strpos($tmp,strtolower($word))!==false){
                    unset($this->internal_format[$i]);
                }
            }
        }

        unset($block);

        $this->sortInternalFormat();

        return $this;

    }
    
    public function convertCharacters($type){
        $searchArray=array_keys(PersianHelper::getPersianMapArray()[$type]);
        $replaceArray=array_values(PersianHelper::getPersianMapArray()[$type]);
        $this->replaceArrays($searchArray, $replaceArray);
    }


    private function replaceArrays($searchArray, $replaceArray)
    {
        for ($i=0; $i <count($this->internal_format) ; $i++) { 
            $block=&$this->internal_format[$i];
            if (is_array($block['lines'])){
                foreach ($block['lines'] as &$value) {
                    $value=str_replace($searchArray,$replaceArray,$value);
                }
            }else{
                $block['lines']=str_replace($searchArray,$replaceArray,$block['lines']);
            }

        }

        unset($block);

        $this->sortInternalFormat();

        return $this;

    }

    
    // -------------------------------------- private ------------------------------------------------------------------

    protected function sortInternalFormat()
    {
        usort($this->internal_format, function($item1, $item2) {
            if ($item2['start'] == $item1['start']) {
                return 0;
            } elseif ($item2['start'] < $item1['start']) {
                return 1;
            } else {
                return -1;
            }
        });
    }

    protected function maxTime()
    {
        $max_time = 0;
        foreach ($this->internal_format as $block) {
            if ($max_time < $block['end']) {
                $max_time = $block['end'];
            }
        }

        return $max_time;
    }

    protected function shouldBlockBeRemoved($block, $from, $till) {
        return ($from < $block['start'] && $block['start'] < $till) || ($from < $block['end'] && $block['end'] < $till);
    }

    public static function loadFile($path, $extension = null)
    {
        if (!file_exists($path)) {
            throw new \Exception("file doesn't exist: " . $path);
        }

        $string = file_get_contents($path);
        if (!$extension) {
            $extension = Helpers::fileExtension($path);
        }

        return static::loadString($string, $extension);
    }

    public static function loadString($text, $extension)
    {
        $converter = new static;
        $converter->input = Helpers::normalizeNewLines(Helpers::removeUtf8Bom($text));

        $converter->input_format = $extension;

        $input_converter = Helpers::getConverter($extension);
        $converter->internal_format = $input_converter->fileContentToInternalFormat($converter->input);

        return $converter;
    }
}

// https://github.com/captioning/captioning has potential, but :(
// https://github.com/snikch/captions-php too small
