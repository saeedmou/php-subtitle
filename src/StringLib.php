<?php
namespace Saeedmou\Subtitles;
/**
 * Class StringLib
 *
 * @see https://github.com/voku/portable-utf8
 */
class StringLib {

    /**
     * @var array
     */
    private static $SUPPORT = array();

    /**
     * @var array
     */
    private static $ENCODINGS = array(
        'CP1256',
        'ANSI_X3.4-1968',
        'ANSI_X3.4-1986',
        'ASCII',
        'UTF-8',
        'CP367',
        'IBM367',
        'ISO-IR-6',
        'ISO646-US',
        'ISO_646.IRV:1991',
        'US',
        'US-ASCII',
        'CSASCII',
        'ISO-10646-UCS-2',
        'UCS-2',
        'CSUNICODE',
        'UCS-2BE',
        'UNICODE-1-1',
        'UNICODEBIG',
        'CSUNICODE11',
        'UCS-2LE',
        'UNICODELITTLE',
        'ISO-10646-UCS-4',
        'UCS-4',
        'CSUCS4',
        'UCS-4BE',
        'UCS-4LE',
        'UTF-16',
        'UTF-16BE',
        'UTF-16LE',
        'UTF-32',
        'UTF-32BE',
        'UTF-32LE',
        'UNICODE-1-1-UTF-7',
        'UTF-7',
        'CSUNICODE11UTF7',
        'UCS-2-INTERNAL',
        'UCS-2-SWAPPED',
        'UCS-4-INTERNAL',
        'UCS-4-SWAPPED',
        'C99',
        'JAVA',
        'CP819',
        'IBM819',
        'ISO-8859-1',
        'ISO-IR-100',
        'ISO8859-1',
        'ISO_8859-1',
        'ISO_8859-1:1987',
        'L1',
        'LATIN1',
        'CSISOLATIN1',
        'ISO-8859-2',
        'ISO-IR-101',
        'ISO8859-2',
        'ISO_8859-2',
        'ISO_8859-2:1987',
        'L2',
        'LATIN2',
        'CSISOLATIN2',
        'ISO-8859-3',
        'ISO-IR-109',
        'ISO8859-3',
        'ISO_8859-3',
        'ISO_8859-3:1988',
        'L3',
        'LATIN3',
        'CSISOLATIN3',
        'ISO-8859-4',
        'ISO-IR-110',
        'ISO8859-4',
        'ISO_8859-4',
        'ISO_8859-4:1988',
        'L4',
        'LATIN4',
        'CSISOLATIN4',
        'CYRILLIC',
        'ISO-8859-5',
        'ISO-IR-144',
        'ISO8859-5',
        'ISO_8859-5',
        'ISO_8859-5:1988',
        'CSISOLATINCYRILLIC',
        'ARABIC',
        'ASMO-708',
        'ECMA-114',
        'ISO-8859-6',
        'ISO-IR-127',
        'ISO8859-6',
        'ISO_8859-6',
        'ISO_8859-6:1987',
        'CSISOLATINARABIC',
        'ECMA-118',
        'ELOT_928',
        'GREEK',
        'GREEK8',
        'ISO-8859-7',
        'ISO-IR-126',
        'ISO8859-7',
        'ISO_8859-7',
        'ISO_8859-7:1987',
        'ISO_8859-7:2003',
        'CSISOLATINGREEK',
        'HEBREW',
        'ISO-8859-8',
        'ISO-IR-138',
        'ISO8859-8',
        'ISO_8859-8',
        'ISO_8859-8:1988',
        'CSISOLATINHEBREW',
        'ISO-8859-9',
        'ISO-IR-148',
        'ISO8859-9',
        'ISO_8859-9',
        'ISO_8859-9:1989',
        'L5',
        'LATIN5',
        'CSISOLATIN5',
        'ISO-8859-10',
        'ISO-IR-157',
        'ISO8859-10',
        'ISO_8859-10',
        'ISO_8859-10:1992',
        'L6',
        'LATIN6',
        'CSISOLATIN6',
        'ISO-8859-11',
        'ISO8859-11',
        'ISO_8859-11',
        'ISO-8859-13',
        'ISO-IR-179',
        'ISO8859-13',
        'ISO_8859-13',
        'L7',
        'LATIN7',
        'ISO-8859-14',
        'ISO-CELTIC',
        'ISO-IR-199',
        'ISO8859-14',
        'ISO_8859-14',
        'ISO_8859-14:1998',
        'L8',
        'LATIN8',
        'ISO-8859-15',
        'ISO-IR-203',
        'ISO8859-15',
        'ISO_8859-15',
        'ISO_8859-15:1998',
        'LATIN-9',
        'ISO-8859-16',
        'ISO-IR-226',
        'ISO8859-16',
        'ISO_8859-16',
        'ISO_8859-16:2001',
        'L10',
        'LATIN10',
        'KOI8-R',
        'CSKOI8R',
        'KOI8-U',
        'KOI8-RU',
        'CP1250',
        'MS-EE',
        'WINDOWS-1250',
        'CP1251',
        'MS-CYRL',
        'WINDOWS-1251',
        'CP1252',
        'MS-ANSI',
        'WINDOWS-1252',
        'CP1253',
        'MS-GREEK',
        'WINDOWS-1253',
        'CP1254',
        'MS-TURK',
        'WINDOWS-1254',
        'CP1255',
        'MS-HEBR',
        'WINDOWS-1255',
        'MS-ARAB',
        'WINDOWS-1256',
        'CP1257',
        'WINBALTRIM',
        'WINDOWS-1257',
        'CP1258',
        'WINDOWS-1258',
        '850',
        'CP850',
        'IBM850',
        'CSPC850MULTILINGUAL',
        '862',
        'CP862',
        'IBM862',
        'CSPC862LATINHEBREW',
        '866',
        'CP866',
        'IBM866',
        'CSIBM866',
        'MAC',
        'MACINTOSH',
        'MACROMAN',
        'CSMACINTOSH',
        'MACCENTRALEUROPE',
        'MACICELAND',
        'MACCROATIAN',
        'MACROMANIA',
        'MACCYRILLIC',
        'MACUKRAINE',
        'MACGREEK',
        'MACTURKISH',
        'MACHEBREW',
        'MACARABIC',
        'MACTHAI',
        'HP-ROMAN8',
        'R8',
        'ROMAN8',
        'CSHPROMAN8',
        'NEXTSTEP',
        'ARMSCII-8',
        'GEORGIAN-ACADEMY',
        'GEORGIAN-PS',
        'KOI8-T',
        'CP154',
        'CYRILLIC-ASIAN',
        'PT154',
        'PTCP154',
        'CSPTCP154',
        'KZ-1048',
        'RK1048',
        'STRK1048-2002',
        'CSKZ1048',
        'MULELAO-1',
        'CP1133',
        'IBM-CP1133',
        'ISO-IR-166',
        'TIS-620',
        'TIS620',
        'TIS620-0',
        'TIS620.2529-1',
        'TIS620.2533-0',
        'TIS620.2533-1',
        'CP874',
        'WINDOWS-874',
        'VISCII',
        'VISCII1.1-1',
        'CSVISCII',
        'TCVN',
        'TCVN-5712',
        'TCVN5712-1',
        'TCVN5712-1:1993',
        'ISO-IR-14',
        'ISO646-JP',
        'JIS_C6220-1969-RO',
        'JP',
        'CSISO14JISC6220RO',
        'JISX0201-1976',
        'JIS_X0201',
        'X0201',
        'CSHALFWIDTHKATAKANA',
        'ISO-IR-87',
        'JIS0208',
        'JIS_C6226-1983',
        'JIS_X0208',
        'JIS_X0208-1983',
        'JIS_X0208-1990',
        'X0208',
        'CSISO87JISX0208',
        'ISO-IR-159',
        'JIS_X0212',
        'JIS_X0212-1990',
        'JIS_X0212.1990-0',
        'X0212',
        'CSISO159JISX02121990',
        'CN',
        'GB_1988-80',
        'ISO-IR-57',
        'ISO646-CN',
        'CSISO57GB1988',
        'CHINESE',
        'GB_2312-80',
        'ISO-IR-58',
        'CSISO58GB231280',
        'CN-GB-ISOIR165',
        'ISO-IR-165',
        'ISO-IR-149',
        'KOREAN',
        'KSC_5601',
        'KS_C_5601-1987',
        'KS_C_5601-1989',
        'CSKSC56011987',
        'EUC-JP',
        'EUCJP',
        'EXTENDED_UNIX_CODE_PACKED_FORMAT_FOR_JAPANESE',
        'CSEUCPKDFMTJAPANESE',
        'MS_KANJI',
        'SHIFT-JIS',
        'SHIFT_JIS',
        'SJIS',
        'CSSHIFTJIS',
        'CP932',
        'ISO-2022-JP',
        'CSISO2022JP',
        'ISO-2022-JP-1',
        'ISO-2022-JP-2',
        'CSISO2022JP2',
        'CN-GB',
        'EUC-CN',
        'EUCCN',
        'GB2312',
        'CSGB2312',
        'GBK',
        'CP936',
        'MS936',
        'WINDOWS-936',
        'GB18030',
        'ISO-2022-CN',
        'CSISO2022CN',
        'ISO-2022-CN-EXT',
        'HZ',
        'HZ-GB-2312',
        'EUC-TW',
        'EUCTW',
        'CSEUCTW',
        'BIG-5',
        'BIG-FIVE',
        'BIG5',
        'BIGFIVE',
        'CN-BIG5',
        'CSBIG5',
        'CP950',
        'BIG5-HKSCS:1999',
        'BIG5-HKSCS:2001',
        'BIG5-HKSCS',
        'BIG5-HKSCS:2004',
        'BIG5HKSCS',
        'EUC-KR',
        'EUCKR',
        'CSEUCKR',
        'CP949',
        'UHC',
        'CP1361',
        'JOHAB',
        'ISO-2022-KR',
        'CSISO2022KR',
        'CP856',
        'CP922',
        'CP943',
        'CP1046',
        'CP1124',
        'CP1129',
        'CP1161',
        'IBM-1161',
        'IBM1161',
        'CSIBM1161',
        'CP1162',
        'IBM-1162',
        'IBM1162',
        'CSIBM1162',
        'CP1163',
        'IBM-1163',
        'IBM1163',
        'CSIBM1163',
        'DEC-KANJI',
        'DEC-HANYU',
        '437',
        'CP437',
        'IBM437',
        'CSPC8CODEPAGE437',
        'CP737',
        'CP775',
        'IBM775',
        'CSPC775BALTIC',
        '852',
        'CP852',
        'IBM852',
        'CSPCP852',
        'CP853',
        '855',
        'CP855',
        'IBM855',
        'CSIBM855',
        '857',
        'CP857',
        'IBM857',
        'CSIBM857',
        'CP858',
        '860',
        'CP860',
        'IBM860',
        'CSIBM860',
        '861',
        'CP-IS',
        'CP861',
        'IBM861',
        'CSIBM861',
        '863',
        'CP863',
        'IBM863',
        'CSIBM863',
        'CP864',
        'IBM864',
        'CSIBM864',
        '865',
        'CP865',
        'IBM865',
        'CSIBM865',
        '869',
        'CP-GR',
        'CP869',
        'IBM869',
        'CSIBM869',
        'CP1125',
        'EUC-JISX0213',
        'SHIFT_JISX0213',
        'ISO-2022-JP-3',
        'BIG5-2003',
        'ISO-IR-230',
        'TDS565',
        'ATARI',
        'ATARIST',
        'RISCOS-LATIN1',
    );

    /**
     * @var array
     */
    private static $ORD = array(
        "\x00" => 0,
        "\x01" => 1,
        "\x02" => 2,
        "\x03" => 3,
        "\x04" => 4,
        "\x05" => 5,
        "\x06" => 6,
        "\x07" => 7,
        "\x08" => 8,
        "\x09" => 9,
        "\x0A" => 10,
        "\x0B" => 11,
        "\x0C" => 12,
        "\x0D" => 13,
        "\x0E" => 14,
        "\x0F" => 15,
        "\x10" => 16,
        "\x11" => 17,
        "\x12" => 18,
        "\x13" => 19,
        "\x14" => 20,
        "\x15" => 21,
        "\x16" => 22,
        "\x17" => 23,
        "\x18" => 24,
        "\x19" => 25,
        "\x1A" => 26,
        "\x1B" => 27,
        "\x1C" => 28,
        "\x1D" => 29,
        "\x1E" => 30,
        "\x1F" => 31,
        "\x20" => 32,
        "\x21" => 33,
        "\x22" => 34,
        "\x23" => 35,
        "\x24" => 36,
        "\x25" => 37,
        "\x26" => 38,
        "\x27" => 39,
        "\x28" => 40,
        "\x29" => 41,
        "\x2A" => 42,
        "\x2B" => 43,
        "\x2C" => 44,
        "\x2D" => 45,
        "\x2E" => 46,
        "\x2F" => 47,
        "\x30" => 48,
        "\x31" => 49,
        "\x32" => 50,
        "\x33" => 51,
        "\x34" => 52,
        "\x35" => 53,
        "\x36" => 54,
        "\x37" => 55,
        "\x38" => 56,
        "\x39" => 57,
        "\x3A" => 58,
        "\x3B" => 59,
        "\x3C" => 60,
        "\x3D" => 61,
        "\x3E" => 62,
        "\x3F" => 63,
        "\x40" => 64,
        "\x41" => 65,
        "\x42" => 66,
        "\x43" => 67,
        "\x44" => 68,
        "\x45" => 69,
        "\x46" => 70,
        "\x47" => 71,
        "\x48" => 72,
        "\x49" => 73,
        "\x4A" => 74,
        "\x4B" => 75,
        "\x4C" => 76,
        "\x4D" => 77,
        "\x4E" => 78,
        "\x4F" => 79,
        "\x50" => 80,
        "\x51" => 81,
        "\x52" => 82,
        "\x53" => 83,
        "\x54" => 84,
        "\x55" => 85,
        "\x56" => 86,
        "\x57" => 87,
        "\x58" => 88,
        "\x59" => 89,
        "\x5A" => 90,
        "\x5B" => 91,
        "\x5C" => 92,
        "\x5D" => 93,
        "\x5E" => 94,
        "\x5F" => 95,
        "\x60" => 96,
        "\x61" => 97,
        "\x62" => 98,
        "\x63" => 99,
        "\x64" => 100,
        "\x65" => 101,
        "\x66" => 102,
        "\x67" => 103,
        "\x68" => 104,
        "\x69" => 105,
        "\x6A" => 106,
        "\x6B" => 107,
        "\x6C" => 108,
        "\x6D" => 109,
        "\x6E" => 110,
        "\x6F" => 111,
        "\x70" => 112,
        "\x71" => 113,
        "\x72" => 114,
        "\x73" => 115,
        "\x74" => 116,
        "\x75" => 117,
        "\x76" => 118,
        "\x77" => 119,
        "\x78" => 120,
        "\x79" => 121,
        "\x7A" => 122,
        "\x7B" => 123,
        "\x7C" => 124,
        "\x7D" => 125,
        "\x7E" => 126,
        "\x7F" => 127,
        "\x80" => 128,
        "\x81" => 129,
        "\x82" => 130,
        "\x83" => 131,
        "\x84" => 132,
        "\x85" => 133,
        "\x86" => 134,
        "\x87" => 135,
        "\x88" => 136,
        "\x89" => 137,
        "\x8A" => 138,
        "\x8B" => 139,
        "\x8C" => 140,
        "\x8D" => 141,
        "\x8E" => 142,
        "\x8F" => 143,
        "\x90" => 144,
        "\x91" => 145,
        "\x92" => 146,
        "\x93" => 147,
        "\x94" => 148,
        "\x95" => 149,
        "\x96" => 150,
        "\x97" => 151,
        "\x98" => 152,
        "\x99" => 153,
        "\x9A" => 154,
        "\x9B" => 155,
        "\x9C" => 156,
        "\x9D" => 157,
        "\x9E" => 158,
        "\x9F" => 159,
        "\xA0" => 160,
        "\xA1" => 161,
        "\xA2" => 162,
        "\xA3" => 163,
        "\xA4" => 164,
        "\xA5" => 165,
        "\xA6" => 166,
        "\xA7" => 167,
        "\xA8" => 168,
        "\xA9" => 169,
        "\xAA" => 170,
        "\xAB" => 171,
        "\xAC" => 172,
        "\xAD" => 173,
        "\xAE" => 174,
        "\xAF" => 175,
        "\xB0" => 176,
        "\xB1" => 177,
        "\xB2" => 178,
        "\xB3" => 179,
        "\xB4" => 180,
        "\xB5" => 181,
        "\xB6" => 182,
        "\xB7" => 183,
        "\xB8" => 184,
        "\xB9" => 185,
        "\xBA" => 186,
        "\xBB" => 187,
        "\xBC" => 188,
        "\xBD" => 189,
        "\xBE" => 190,
        "\xBF" => 191,
        "\xC0" => 192,
        "\xC1" => 193,
        "\xC2" => 194,
        "\xC3" => 195,
        "\xC4" => 196,
        "\xC5" => 197,
        "\xC6" => 198,
        "\xC7" => 199,
        "\xC8" => 200,
        "\xC9" => 201,
        "\xCA" => 202,
        "\xCB" => 203,
        "\xCC" => 204,
        "\xCD" => 205,
        "\xCE" => 206,
        "\xCF" => 207,
        "\xD0" => 208,
        "\xD1" => 209,
        "\xD2" => 210,
        "\xD3" => 211,
        "\xD4" => 212,
        "\xD5" => 213,
        "\xD6" => 214,
        "\xD7" => 215,
        "\xD8" => 216,
        "\xD9" => 217,
        "\xDA" => 218,
        "\xDB" => 219,
        "\xDC" => 220,
        "\xDD" => 221,
        "\xDE" => 222,
        "\xDF" => 223,
        "\xE0" => 224,
        "\xE1" => 225,
        "\xE2" => 226,
        "\xE3" => 227,
        "\xE4" => 228,
        "\xE5" => 229,
        "\xE6" => 230,
        "\xE7" => 231,
        "\xE8" => 232,
        "\xE9" => 233,
        "\xEA" => 234,
        "\xEB" => 235,
        "\xEC" => 236,
        "\xED" => 237,
        "\xEE" => 238,
        "\xEF" => 239,
        "\xF0" => 240,
        "\xF1" => 241,
        "\xF2" => 242,
        "\xF3" => 243,
        "\xF4" => 244,
        "\xF5" => 245,
        "\xF6" => 246,
        "\xF7" => 247,
        "\xF8" => 248,
        "\xF9" => 249,
        "\xFA" => 250,
        "\xFB" => 251,
        "\xFC" => 252,
        "\xFD" => 253,
        "\xFE" => 254,
        "\xFF" => 255,
    );

    /**
     * @var array
     */
    private static $CHR = array(
        0   => "\x00",
        1   => "\x01",
        2   => "\x02",
        3   => "\x03",
        4   => "\x04",
        5   => "\x05",
        6   => "\x06",
        7   => "\x07",
        8   => "\x08",
        9   => "\x09",
        10  => "\x0A",
        11  => "\x0B",
        12  => "\x0C",
        13  => "\x0D",
        14  => "\x0E",
        15  => "\x0F",
        16  => "\x10",
        17  => "\x11",
        18  => "\x12",
        19  => "\x13",
        20  => "\x14",
        21  => "\x15",
        22  => "\x16",
        23  => "\x17",
        24  => "\x18",
        25  => "\x19",
        26  => "\x1A",
        27  => "\x1B",
        28  => "\x1C",
        29  => "\x1D",
        30  => "\x1E",
        31  => "\x1F",
        32  => "\x20",
        33  => "\x21",
        34  => "\x22",
        35  => "\x23",
        36  => "\x24",
        37  => "\x25",
        38  => "\x26",
        39  => "\x27",
        40  => "\x28",
        41  => "\x29",
        42  => "\x2A",
        43  => "\x2B",
        44  => "\x2C",
        45  => "\x2D",
        46  => "\x2E",
        47  => "\x2F",
        48  => "\x30",
        49  => "\x31",
        50  => "\x32",
        51  => "\x33",
        52  => "\x34",
        53  => "\x35",
        54  => "\x36",
        55  => "\x37",
        56  => "\x38",
        57  => "\x39",
        58  => "\x3A",
        59  => "\x3B",
        60  => "\x3C",
        61  => "\x3D",
        62  => "\x3E",
        63  => "\x3F",
        64  => "\x40",
        65  => "\x41",
        66  => "\x42",
        67  => "\x43",
        68  => "\x44",
        69  => "\x45",
        70  => "\x46",
        71  => "\x47",
        72  => "\x48",
        73  => "\x49",
        74  => "\x4A",
        75  => "\x4B",
        76  => "\x4C",
        77  => "\x4D",
        78  => "\x4E",
        79  => "\x4F",
        80  => "\x50",
        81  => "\x51",
        82  => "\x52",
        83  => "\x53",
        84  => "\x54",
        85  => "\x55",
        86  => "\x56",
        87  => "\x57",
        88  => "\x58",
        89  => "\x59",
        90  => "\x5A",
        91  => "\x5B",
        92  => "\x5C",
        93  => "\x5D",
        94  => "\x5E",
        95  => "\x5F",
        96  => "\x60",
        97  => "\x61",
        98  => "\x62",
        99  => "\x63",
        100 => "\x64",
        101 => "\x65",
        102 => "\x66",
        103 => "\x67",
        104 => "\x68",
        105 => "\x69",
        106 => "\x6A",
        107 => "\x6B",
        108 => "\x6C",
        109 => "\x6D",
        110 => "\x6E",
        111 => "\x6F",
        112 => "\x70",
        113 => "\x71",
        114 => "\x72",
        115 => "\x73",
        116 => "\x74",
        117 => "\x75",
        118 => "\x76",
        119 => "\x77",
        120 => "\x78",
        121 => "\x79",
        122 => "\x7A",
        123 => "\x7B",
        124 => "\x7C",
        125 => "\x7D",
        126 => "\x7E",
        127 => "\x7F",
        128 => "\x80",
        129 => "\x81",
        130 => "\x82",
        131 => "\x83",
        132 => "\x84",
        133 => "\x85",
        134 => "\x86",
        135 => "\x87",
        136 => "\x88",
        137 => "\x89",
        138 => "\x8A",
        139 => "\x8B",
        140 => "\x8C",
        141 => "\x8D",
        142 => "\x8E",
        143 => "\x8F",
        144 => "\x90",
        145 => "\x91",
        146 => "\x92",
        147 => "\x93",
        148 => "\x94",
        149 => "\x95",
        150 => "\x96",
        151 => "\x97",
        152 => "\x98",
        153 => "\x99",
        154 => "\x9A",
        155 => "\x9B",
        156 => "\x9C",
        157 => "\x9D",
        158 => "\x9E",
        159 => "\x9F",
        160 => "\xA0",
        161 => "\xA1",
        162 => "\xA2",
        163 => "\xA3",
        164 => "\xA4",
        165 => "\xA5",
        166 => "\xA6",
        167 => "\xA7",
        168 => "\xA8",
        169 => "\xA9",
        170 => "\xAA",
        171 => "\xAB",
        172 => "\xAC",
        173 => "\xAD",
        174 => "\xAE",
        175 => "\xAF",
        176 => "\xB0",
        177 => "\xB1",
        178 => "\xB2",
        179 => "\xB3",
        180 => "\xB4",
        181 => "\xB5",
        182 => "\xB6",
        183 => "\xB7",
        184 => "\xB8",
        185 => "\xB9",
        186 => "\xBA",
        187 => "\xBB",
        188 => "\xBC",
        189 => "\xBD",
        190 => "\xBE",
        191 => "\xBF",
        192 => "\xC0",
        193 => "\xC1",
        194 => "\xC2",
        195 => "\xC3",
        196 => "\xC4",
        197 => "\xC5",
        198 => "\xC6",
        199 => "\xC7",
        200 => "\xC8",
        201 => "\xC9",
        202 => "\xCA",
        203 => "\xCB",
        204 => "\xCC",
        205 => "\xCD",
        206 => "\xCE",
        207 => "\xCF",
        208 => "\xD0",
        209 => "\xD1",
        210 => "\xD2",
        211 => "\xD3",
        212 => "\xD4",
        213 => "\xD5",
        214 => "\xD6",
        215 => "\xD7",
        216 => "\xD8",
        217 => "\xD9",
        218 => "\xDA",
        219 => "\xDB",
        220 => "\xDC",
        221 => "\xDD",
        222 => "\xDE",
        223 => "\xDF",
        224 => "\xE0",
        225 => "\xE1",
        226 => "\xE2",
        227 => "\xE3",
        228 => "\xE4",
        229 => "\xE5",
        230 => "\xE6",
        231 => "\xE7",
        232 => "\xE8",
        233 => "\xE9",
        234 => "\xEA",
        235 => "\xEB",
        236 => "\xEC",
        237 => "\xED",
        238 => "\xEE",
        239 => "\xEF",
        240 => "\xF0",
        241 => "\xF1",
        242 => "\xF2",
        243 => "\xF3",
        244 => "\xF4",
        245 => "\xF5",
        246 => "\xF6",
        247 => "\xF7",
        248 => "\xF8",
        249 => "\xF9",
        250 => "\xFA",
        251 => "\xFB",
        252 => "\xFC",
        253 => "\xFD",
        254 => "\xFE",
        255 => "\xFF",
    );

    /**
     * @var array
     */
    private static $WIN1252_TO_UTF8 = array(
        0x80 => "\xe2\x82\xac", # €
        0x82 => "\xe2\x80\x9a", # ‚
        0x83 => "\xc6\x92",     # ƒ
        0x84 => "\xe2\x80\x9e", # „
        0x85 => "\xe2\x80\xa6", # …
        0x86 => "\xe2\x80\xa0", # †
        0x87 => "\xe2\x80\xa1", # ‡
        0x88 => "\xcb\x86",     # ˆ
        0x89 => "\xe2\x80\xb0", # ‰
        0x8a => "\xc5\xa0",     # Š
        0x8b => "\xe2\x80\xb9", # ‹
        0x8c => "\xc5\x92",     # Œ
        0x8e => "\xc5\xbd",     # Ž
        0x91 => "\xe2\x80\x98", # ‘
        0x92 => "\xe2\x80\x99", # ’
        0x93 => "\xe2\x80\x9c", # “
        0x94 => "\xe2\x80\x9d", # ”
        0x95 => "\xe2\x80\xa2", # •
        0x96 => "\xe2\x80\x93", # –
        0x97 => "\xe2\x80\x94", # —
        0x98 => "\xcb\x9c",     # ˜
        0x99 => "\xe2\x84\xa2", # ™
        0x9a => "\xc5\xa1",     # š
        0x9b => "\xe2\x80\xba", # ›
        0x9c => "\xc5\x93",     # œ
        0x9e => "\xc5\xbe",     # ž
        0x9f => "\xc5\xb8",     # Ÿ
        0xa0 => "\xc2\xa0",     #
        0xa1 => "\xc2\xa1",     # ¡
        0xa2 => "\xc2\xa2",     # ¢
        0xa3 => "\xc2\xa3",     # £
        0xa4 => "\xc2\xa4",     # ¤
        0xa5 => "\xc2\xa5",     # ¥
        0xa6 => "\xc2\xa6",     # ¦
        0xa7 => "\xc2\xa7",     # §
        0xa8 => "\xc2\xa8",     # ¨
        0xa9 => "\xc2\xa9",     # ©
        0xaa => "\xc2\xaa",     # ª
        0xab => "\xc2\xab",     # «
        0xac => "\xc2\xac",     # ¬
        0xad => "\xc2\xad",     # ­
        0xae => "\xc2\xae",     # ®
        0xaf => "\xc2\xaf",     # ¯
        0xb0 => "\xc2\xb0",     # °
        0xb1 => "\xc2\xb1",     # ±
        0xb2 => "\xc2\xb2",     # ²
        0xb3 => "\xc2\xb3",     # ³
        0xb4 => "\xc2\xb4",     # ´
        0xb5 => "\xc2\xb5",     # µ
        0xb6 => "\xc2\xb6",     # ¶
        0xb7 => "\xc2\xb7",     # ·
        0xb8 => "\xc2\xb8",     # ¸
        0xb9 => "\xc2\xb9",     # ¹
        0xba => "\xc2\xba",     # º
        0xbb => "\xc2\xbb",     # »
        0xbc => "\xc2\xbc",     # ¼
        0xbd => "\xc2\xbd",     # ½
        0xbe => "\xc2\xbe",     # ¾
        0xbf => "\xc2\xbf",     # ¿
        0xc0 => "\xc3\x80",     # À
        0xc1 => "\xc3\x81",     # Á
        0xc2 => "\xc3\x82",     # Â
        0xc3 => "\xc3\x83",     # Ã
        0xc4 => "\xc3\x84",     # Ä
        0xc5 => "\xc3\x85",     # Å
        0xc6 => "\xc3\x86",     # Æ
        0xc7 => "\xc3\x87",     # Ç
        0xc8 => "\xc3\x88",     # È
        0xc9 => "\xc3\x89",     # É
        0xca => "\xc3\x8a",     # Ê
        0xcb => "\xc3\x8b",     # Ë
        0xcc => "\xc3\x8c",     # Ì
        0xcd => "\xc3\x8d",     # Í
        0xce => "\xc3\x8e",     # Î
        0xcf => "\xc3\x8f",     # Ï
        0xd0 => "\xc3\x90",     # Ð
        0xd1 => "\xc3\x91",     # Ñ
        0xd2 => "\xc3\x92",     # Ò
        0xd3 => "\xc3\x93",     # Ó
        0xd4 => "\xc3\x94",     # Ô
        0xd5 => "\xc3\x95",     # Õ
        0xd6 => "\xc3\x96",     # Ö
        0xd7 => "\xc3\x97",     # ×
        0xd8 => "\xc3\x98",     # Ø
        0xd9 => "\xc3\x99",     # Ù
        0xda => "\xc3\x9a",     # Ú
        0xdb => "\xc3\x9b",     # Û
        0xdc => "\xc3\x9c",     # Ü
        0xdd => "\xc3\x9d",     # Ý
        0xde => "\xc3\x9e",     # Þ
        0xdf => "\xc3\x9f",     # ß
        0xe0 => "\xc3\xa0",     # à
        0xe1 => "\xa1",         # á
        0xe2 => "\xc3\xa2",     # â
        0xe3 => "\xc3\xa3",     # ã
        0xe4 => "\xc3\xa4",     # ä
        0xe5 => "\xc3\xa5",     # å
        0xe6 => "\xc3\xa6",     # æ
        0xe7 => "\xc3\xa7",     # ç
        0xe8 => "\xc3\xa8",     # è
        0xe9 => "\xc3\xa9",     # é
        0xea => "\xc3\xaa",     # ê
        0xeb => "\xc3\xab",     # ë
        0xec => "\xc3\xac",     # ì
        0xed => "\xc3\xad",     # í
        0xee => "\xc3\xae",     # î
        0xef => "\xc3\xaf",     # ï
        0xf0 => "\xc3\xb0",     # ð
        0xf1 => "\xc3\xb1",     # ñ
        0xf2 => "\xc3\xb2",     # ò
        0xf3 => "\xc3\xb3",     # ó
        0xf4 => "\xc3\xb4",     # ô
        0xf5 => "\xc3\xb5",     # õ
        0xf6 => "\xc3\xb6",     # ö
        0xf7 => "\xc3\xb7",     # ÷
        0xf8 => "\xc3\xb8",     # ø
        0xf9 => "\xc3\xb9",     # ù
        0xfa => "\xc3\xba",     # ú
        0xfb => "\xc3\xbb",     # û
        0xfc => "\xc3\xbc",     # ü
        0xfd => "\xc3\xbd",     # ý
        0xfe => "\xc3\xbe",     # þ
    );

    /**
     * @var array
     */
    private static $UTF8_MSWORD = array(
        "\xc2\xab"     => '"', // « (U+00AB) in UTF-8
        "\xc2\xbb"     => '"', // » (U+00BB) in UTF-8
        "\xe2\x80\x98" => "'", // ‘ (U+2018) in UTF-8
        "\xe2\x80\x99" => "'", // ’ (U+2019) in UTF-8
        "\xe2\x80\x9a" => "'", // ‚ (U+201A) in UTF-8
        "\xe2\x80\x9b" => "'", // ‛ (U+201B) in UTF-8
        "\xe2\x80\x9c" => '"', // “ (U+201C) in UTF-8
        "\xe2\x80\x9d" => '"', // ” (U+201D) in UTF-8
        "\xe2\x80\x9e" => '"', // „ (U+201E) in UTF-8
        "\xe2\x80\x9f" => '"', // ‟ (U+201F) in UTF-8
        "\xe2\x80\xb9" => "'", // ‹ (U+2039) in UTF-8
        "\xe2\x80\xba" => "'", // › (U+203A) in UTF-8
        "\xe2\x80\x93" => '-', // – (U+2013) in UTF-8
        "\xe2\x80\x94" => '-', // — (U+2014) in UTF-8
        "\xe2\x80\xa6" => '...' // … (U+2026) in UTF-8
    );

    /**
     * Bom => Byte-Length
     *
     * INFO: https://en.wikipedia.org/wiki/Byte_order_mark
     *
     * @var array
     */
    private static $BOM = array(
        "\xef\xbb\xbf"     => 3, // UTF-8 BOM
        'ï»¿'              => 6, // UTF-8 BOM as "WINDOWS-1252" (one char has [maybe] more then one byte ...)
        "\x00\x00\xfe\xff" => 4, // UTF-32 (BE) BOM
        '  þÿ'             => 6, // UTF-32 (BE) BOM as "WINDOWS-1252"
        "\xff\xfe\x00\x00" => 4, // UTF-32 (LE) BOM
        'ÿþ  '             => 6, // UTF-32 (LE) BOM as "WINDOWS-1252"
        "\xfe\xff"         => 2, // UTF-16 (BE) BOM
        'þÿ'               => 4, // UTF-16 (BE) BOM as "WINDOWS-1252"
        "\xff\xfe"         => 2, // UTF-16 (LE) BOM
        'ÿþ'               => 4, // UTF-16 (LE) BOM as "WINDOWS-1252"
    );

    /**
     * @var array
     */
    private static $WHITESPACE_TABLE = array(
        'SPACE'                     => "\x20",
        'NO-BREAK SPACE'            => "\xc2\xa0",
        'OGHAM SPACE MARK'          => "\xe1\x9a\x80",
        'EN QUAD'                   => "\xe2\x80\x80",
        'EM QUAD'                   => "\xe2\x80\x81",
        'EN SPACE'                  => "\xe2\x80\x82",
        'EM SPACE'                  => "\xe2\x80\x83",
        'THREE-PER-EM SPACE'        => "\xe2\x80\x84",
        'FOUR-PER-EM SPACE'         => "\xe2\x80\x85",
        'SIX-PER-EM SPACE'          => "\xe2\x80\x86",
        'FIGURE SPACE'              => "\xe2\x80\x87",
        'PUNCTUATION SPACE'         => "\xe2\x80\x88",
        'THIN SPACE'                => "\xe2\x80\x89",
        'HAIR SPACE'                => "\xe2\x80\x8a",
        'LINE SEPARATOR'            => "\xe2\x80\xa8",
        'PARAGRAPH SEPARATOR'       => "\xe2\x80\xa9",
        'ZERO WIDTH SPACE'          => "\xe2\x80\x8b",
        'NARROW NO-BREAK SPACE'     => "\xe2\x80\xaf",
        'MEDIUM MATHEMATICAL SPACE' => "\xe2\x81\x9f",
        'IDEOGRAPHIC SPACE'         => "\xe3\x80\x80",
    );

    private static $BROKEN_UTF8_FIX = array(
        "\xc2\x80" => "\xe2\x82\xac", // EURO SIGN
        "\xc2\x82" => "\xe2\x80\x9a", // SINGLE LOW-9 QUOTATION MARK
        "\xc2\x83" => "\xc6\x92", // LATIN SMALL LETTER F WITH HOOK
        "\xc2\x84" => "\xe2\x80\x9e", // DOUBLE LOW-9 QUOTATION MARK
        "\xc2\x85" => "\xe2\x80\xa6", // HORIZONTAL ELLIPSIS
        "\xc2\x86" => "\xe2\x80\xa0", // DAGGER
        "\xc2\x87" => "\xe2\x80\xa1", // DOUBLE DAGGER
        "\xc2\x88" => "\xcb\x86", // MODIFIER LETTER CIRCUMFLEX ACCENT
        "\xc2\x89" => "\xe2\x80\xb0", // PER MILLE SIGN
        "\xc2\x8a" => "\xc5\xa0", // LATIN CAPITAL LETTER S WITH CARON
        "\xc2\x8b" => "\xe2\x80\xb9", // SINGLE LEFT-POINTING ANGLE QUOTE
        "\xc2\x8c" => "\xc5\x92", // LATIN CAPITAL LIGATURE OE
        "\xc2\x8e" => "\xc5\xbd", // LATIN CAPITAL LETTER Z WITH CARON
        "\xc2\x91" => "\xe2\x80\x98", // LEFT SINGLE QUOTATION MARK
        "\xc2\x92" => "\xe2\x80\x99", // RIGHT SINGLE QUOTATION MARK
        "\xc2\x93" => "\xe2\x80\x9c", // LEFT DOUBLE QUOTATION MARK
        "\xc2\x94" => "\xe2\x80\x9d", // RIGHT DOUBLE QUOTATION MARK
        "\xc2\x95" => "\xe2\x80\xa2", // BULLET
        "\xc2\x96" => "\xe2\x80\x93", // EN DASH
        "\xc2\x97" => "\xe2\x80\x94", // EM DASH
        "\xc2\x98" => "\xcb\x9c", // SMALL TILDE
        "\xc2\x99" => "\xe2\x84\xa2", // TRADE MARK SIGN
        "\xc2\x9a" => "\xc5\xa1", // LATIN SMALL LETTER S WITH CARON
        "\xc2\x9b" => "\xe2\x80\xba", // SINGLE RIGHT-POINTING ANGLE QUOTE
        "\xc2\x9c" => "\xc5\x93", // LATIN SMALL LIGATURE OE
        "\xc2\x9e" => "\xc5\xbe", // LATIN SMALL LETTER Z WITH CARON
        "\xc2\x9f" => "\xc5\xb8", // LATIN CAPITAL LETTER Y WITH DIAERESIS
        'Ã¼'       => 'ü',
        'Ã¤'       => 'ä',
        'Ã¶'       => 'ö',
        'Ã–'       => 'Ö',
        'ÃŸ'       => 'ß',
        'Ã '       => 'à',
        'Ã¡'       => 'á',
        'Ã¢'       => 'â',
        'Ã£'       => 'ã',
        'Ã¹'       => 'ù',
        'Ãº'       => 'ú',
        'Ã»'       => 'û',
        'Ã™'       => 'Ù',
        'Ãš'       => 'Ú',
        'Ã›'       => 'Û',
        'Ãœ'       => 'Ü',
        'Ã²'       => 'ò',
        'Ã³'       => 'ó',
        'Ã´'       => 'ô',
        'Ã¨'       => 'è',
        'Ã©'       => 'é',
        'Ãª'       => 'ê',
        'Ã«'       => 'ë',
        'Ã€'       => 'À',
        'Ã'       => 'Á',
        'Ã‚'       => 'Â',
        'Ãƒ'       => 'Ã',
        'Ã„'       => 'Ä',
        'Ã…'       => 'Å',
        'Ã‡'       => 'Ç',
        'Ãˆ'       => 'È',
        'Ã‰'       => 'É',
        'ÃŠ'       => 'Ê',
        'Ã‹'       => 'Ë',
        'ÃŒ'       => 'Ì',
        'Ã'       => 'Í',
        'ÃŽ'       => 'Î',
        'Ã'       => 'Ï',
        'Ã‘'       => 'Ñ',
        'Ã’'       => 'Ò',
        'Ã“'       => 'Ó',
        'Ã”'       => 'Ô',
        'Ã•'       => 'Õ',
        'Ã˜'       => 'Ø',
        'Ã¥'       => 'å',
        'Ã¦'       => 'æ',
        'Ã§'       => 'ç',
        'Ã¬'       => 'ì',
        'Ã­'       => 'í',
        'Ã®'       => 'î',
        'Ã¯'       => 'ï',
        'Ã°'       => 'ð',
        'Ã±'       => 'ñ',
        'Ãµ'       => 'õ',
        'Ã¸'       => 'ø',
        'Ã½'       => 'ý',
        'Ã¿'       => 'ÿ',
        'â‚¬'      => '€',
        'â€™'      => '’',
    );

    /**
     * bidirectional text chars
     *
     * url: https://www.w3.org/International/questions/qa-bidi-unicode-controls
     *
     * @var array
     */
    private static $BIDI_UNI_CODE_CONTROLS_TABLE = array(
        // LEFT-TO-RIGHT EMBEDDING (use -> dir = "ltr")
        8234 => "\xE2\x80\xAA",
        // RIGHT-TO-LEFT EMBEDDING (use -> dir = "rtl")
        8235 => "\xE2\x80\xAB",
        // POP DIRECTIONAL FORMATTING // (use -> </bdo>)
        8236 => "\xE2\x80\xAC",
        // LEFT-TO-RIGHT OVERRIDE // (use -> <bdo dir = "ltr">)
        8237 => "\xE2\x80\xAD",
        // RIGHT-TO-LEFT OVERRIDE // (use -> <bdo dir = "rtl">)
        8238 => "\xE2\x80\xAE",
        // LEFT-TO-RIGHT ISOLATE // (use -> dir = "ltr")
        8294 => "\xE2\x81\xA6",
        // RIGHT-TO-LEFT ISOLATE // (use -> dir = "rtl")
        8295 => "\xE2\x81\xA7",
        // FIRST STRONG ISOLATE // (use -> dir = "auto")
        8296 => "\xE2\x81\xA8",
        // POP DIRECTIONAL ISOLATE
        8297 => "\xE2\x81\xA9",
    );

    /**
     * This method will auto-detect your server environment for UTF-8 support.
     *
     * INFO: You don't need to run it manually, it will be triggered if it's needed.
     */
    public static function checkForSupport() {
        if (!isset(self::$SUPPORT['already_checked_via_portable_utf8'])) {
            self::$SUPPORT['already_checked_via_portable_utf8'] = true;

            // http://php.net/manual/en/book.mbstring.php
            self::$SUPPORT['mbstring'] = self::mbstring_loaded();
            self::$SUPPORT['mbstring_func_overload'] = self::mbstring_overloaded();

            // http://php.net/manual/en/book.iconv.php
            self::$SUPPORT['iconv'] = self::iconv_loaded();

            // http://php.net/manual/en/book.intl.php
            self::$SUPPORT['intl'] = self::intl_loaded();
            self::$SUPPORT['intl__transliterator_list_ids'] = array();

            if (
                self::$SUPPORT['intl'] === true
                &&
                \function_exists('transliterator_list_ids') === true
            ) {
                self::$SUPPORT['intl__transliterator_list_ids'] = transliterator_list_ids();
            }

            // http://php.net/manual/en/class.intlchar.php
            self::$SUPPORT['intlChar'] = self::intlChar_loaded();

            // http://php.net/manual/en/book.pcre.php
            self::$SUPPORT['pcre_utf8'] = self::pcre_utf8_support();
        }
    }

    /**
     * Generates an array of byte length of each character of a Unicode string.
     *
     * 1 byte => U+0000  - U+007F
     * 2 byte => U+0080  - U+07FF
     * 3 byte => U+0800  - U+FFFF
     * 4 byte => U+10000 - U+10FFFF
     *
     * @param string $str <p>The original unicode string.</p>
     *
     * @return array <p>An array of byte lengths of each character.</p>
     */
    public static function chr_size_list($str) {
        if (!isset($str[0])) {
            return array();
        }

        return \array_map(
            function ($data) {
                return \strlen($data); // count the bytes
            },
            self::split($str)
        );
    }

    /**
     * Accepts a string and removes all non-UTF-8 characters from it + extras if needed.
     *
     * @param string $str                           <p>The string to be sanitized.</p>
     * @param bool   $remove_bom                    [optional] <p>Set to true, if you need to remove UTF-BOM.</p>
     * @param bool   $normalize_whitespace          [optional] <p>Set to true, if you need to normalize the
     *                                              whitespace.</p>
     * @param bool   $normalize_msword              [optional] <p>Set to true, if you need to normalize MS Word chars
     *                                              e.g.: "…"
     *                                              => "..."</p>
     * @param bool   $keep_non_breaking_space       [optional] <p>Set to true, to keep non-breaking-spaces, in
     *                                              combination with
     *                                              $normalize_whitespace</p>
     * @param bool   $replace_diamond_question_mark [optional] <p>Set to true, if you need to remove diamond question
     *                                              mark e.g.: "�"</p>
     * @param bool   $remove_invisible_characters   [optional] <p>Set to false, if you not want to remove invisible
     *                                              characters e.g.: "\0"</p>
     *
     * @return string <p>Clean UTF-8 encoded string.</p>
     */
    public static function clean($str, $remove_bom = false, $normalize_whitespace = false, $normalize_msword = false, $keep_non_breaking_space = false, $replace_diamond_question_mark = false, $remove_invisible_characters = true)
    {
        // http://stackoverflow.com/questions/1401317/remove-non-utf8-characters-from-string
        // caused connection reset problem on larger strings

        $regx = '/
          (
            (?: [\x00-\x7F]               # single-byte sequences   0xxxxxxx
            |   [\xC0-\xDF][\x80-\xBF]    # double-byte sequences   110xxxxx 10xxxxxx
            |   [\xE0-\xEF][\x80-\xBF]{2} # triple-byte sequences   1110xxxx 10xxxxxx * 2
            |   [\xF0-\xF7][\x80-\xBF]{3} # quadruple-byte sequence 11110xxx 10xxxxxx * 3
            ){1,100}                      # ...one or more times
          )
        | ( [\x80-\xBF] )                 # invalid byte in range 10000000 - 10111111
        | ( [\xC0-\xFF] )                 # invalid byte in range 11000000 - 11111111
        /x';
        $str = (string)\preg_replace($regx, '$1', $str);

        if ($replace_diamond_question_mark === true) {
            $str = self::replace_diamond_question_mark($str, '');
        }

        if ($remove_invisible_characters === true) {
            $str = self::remove_invisible_characters($str);
        }

        if ($normalize_whitespace === true) {
            $str = self::normalize_whitespace($str, $keep_non_breaking_space);
        }

        if ($normalize_msword === true) {
            $str = self::normalize_msword($str);
        }

        if ($remove_bom === true) {
            $str = self::remove_bom($str);
        }

        return $str;
    }

    /**
     * Returns count of characters used in a string.
     *
     * @param string $str       <p>The input string.</p>
     * @param bool   $cleanUtf8 [optional] <p>Remove non UTF-8 chars from the string.</p>
     *
     * @return array <p>An associative array of Character as keys and
     *               their count as values.</p>
     */
    public static function count_chars($str, $cleanUtf8 = false) {
        return \array_count_values(self::split($str, 1, $cleanUtf8));
    }

    /**
     * Encode a string with a new charset-encoding.
     *
     * INFO:  The different to "StringLib::utf8_encode()" is that this function, try to fix also broken / double encoding,
     *        so you can call this function also on a UTF-8 String and you don't mess the string.
     *
     * @param string $encoding <p>e.g. 'UTF-16', 'UTF-8', 'ISO-8859-1', etc.</p>
     * @param string $str      <p>The input string</p>
     * @param bool   $force    [optional] <p>Force the new encoding (we try to fix broken / double encoding for
     *                         UTF-8)<br> otherwise we auto-detect the current string-encoding</p>
     *
     * @return string
     */
    public static function encode($encoding, $str, $force = true) {
        if (!isset($str[0], $encoding[0])) {
            return $str;
        }

        if ($encoding !== 'UTF-8') {
            $encoding = self::normalize_encoding($encoding, 'UTF-8');
        }

        if (!isset(self::$SUPPORT['already_checked_via_portable_utf8'])) {
            self::checkForSupport();
        }

        $encodingDetected = self::str_detect_encoding($str);
        if (
            $encodingDetected !== false
            &&
            (
                $force === true
                ||
                $encodingDetected !== $encoding
            )
        ) {
            if (
                $encoding === 'UTF-8'
                &&
                (
                    $force === true
                    || $encodingDetected === 'UTF-8'
                    || $encodingDetected === 'WINDOWS-1252'
                    || $encodingDetected === 'ISO-8859-1'
                )
            ) {
                return self::to_utf8($str);
            }

            if (
                $encoding === 'ISO-8859-1'
                &&
                (
                    $force === true
                    || $encodingDetected === 'ISO-8859-1'
                    || $encodingDetected === 'WINDOWS-1252'
                    || $encodingDetected === 'UTF-8'
                )
            ) {
                return self::to_iso8859($str);
            }

            if (
                $encoding !== 'UTF-8'
                &&
                $encoding !== 'WINDOWS-1252'
                &&
                self::$SUPPORT['mbstring'] === false
            ) {
                \trigger_error('StringLib::encode() without mbstring cannot handle "' . $encoding . '" encoding', E_USER_WARNING);
            }

            $strEncoded = \mb_convert_encoding(
                $str,
                $encoding,
                $encodingDetected
            );

            if ($strEncoded) {
                return $strEncoded;
            }
        }

        return $str;
    }

    /**
     * Convert a string into "ISO-8859"-encoding (Latin-1).
     *
     * @param string|string[] $str
     *
     * @return string|string[]
     */
    public static function to_iso8859($str)
    {
        if (\is_array($str) === true) {
            foreach ($str as $k => $v) {
                $str[$k] = self::to_iso8859($v);
            }

            return $str;
        }

        $str = (string)$str;
        if (!isset($str[0])) {
            return '';
        }

        return self::utf8_decode($str);
    }

    /**
     * Converts a UTF-8 string to a series of HTML numbered entities.
     *
     * INFO: opposite to StringLib::html_decode()
     *
     * @param string $str            <p>The Unicode string to be encoded as numbered entities.</p>
     * @param bool   $keepAsciiChars [optional] <p>Keep ASCII chars.</p>
     * @param string $encoding       [optional] <p>Default is UTF-8</p>
     *
     * @return string <p>HTML numbered entities.</p>
     */
    public static function html_encode($str, $keepAsciiChars = false, $encoding = 'UTF-8') {
        if (!isset($str[0])) {
            return '';
        }

        if ($encoding !== 'UTF-8') {
            $encoding = self::normalize_encoding($encoding, 'UTF-8');
        }

        # INFO: http://stackoverflow.com/questions/35854535/better-explanation-of-convmap-in-mb-encode-numericentity
        if (\function_exists('mb_encode_numericentity')) {
            $startCode = 0x00;
            if ($keepAsciiChars === true) {
                $startCode = 0x80;
            }

            return \mb_encode_numericentity(
                $str,
                array($startCode, 0xfffff, 0, 0xfffff, 0),
                $encoding
            );
        }

        return \implode(
            '',
            \array_map(
                function ($data) use ($keepAsciiChars, $encoding) {
                    return StringLib::single_chr_html_encode($data, $keepAsciiChars, $encoding);
                },
                self::split($str)
            )
        );
    }

    /**
     * UTF-8 version of html_entity_decode()
     *
     * The reason we are not using html_entity_decode() by itself is because
     * while it is not technically correct to leave out the semicolon
     * at the end of an entity most browsers will still interpret the entity
     * correctly. html_entity_decode() does not convert entities without
     * semicolons, so we are left with our own little solution here. Bummer.
     *
     * Convert all HTML entities to their applicable characters
     *
     * INFO: opposite to StringLib::html_encode()
     *
     * @link http://php.net/manual/en/function.html-entity-decode.php
     *
     * @param string $str      <p>
     *                         The input string.
     *                         </p>
     * @param int    $flags    [optional] <p>
     *                         A bitmask of one or more of the following flags, which specify how to handle quotes and
     *                         which document type to use. The default is ENT_COMPAT | ENT_HTML401.
     *                         <table>
     *                         Available <i>flags</i> constants
     *                         <tr valign="top">
     *                         <td>Constant Name</td>
     *                         <td>Description</td>
     *                         </tr>
     *                         <tr valign="top">
     *                         <td><b>ENT_COMPAT</b></td>
     *                         <td>Will convert double-quotes and leave single-quotes alone.</td>
     *                         </tr>
     *                         <tr valign="top">
     *                         <td><b>ENT_QUOTES</b></td>
     *                         <td>Will convert both double and single quotes.</td>
     *                         </tr>
     *                         <tr valign="top">
     *                         <td><b>ENT_NOQUOTES</b></td>
     *                         <td>Will leave both double and single quotes unconverted.</td>
     *                         </tr>
     *                         <tr valign="top">
     *                         <td><b>ENT_HTML401</b></td>
     *                         <td>
     *                         Handle code as HTML 4.01.
     *                         </td>
     *                         </tr>
     *                         <tr valign="top">
     *                         <td><b>ENT_XML1</b></td>
     *                         <td>
     *                         Handle code as XML 1.
     *                         </td>
     *                         </tr>
     *                         <tr valign="top">
     *                         <td><b>ENT_XHTML</b></td>
     *                         <td>
     *                         Handle code as XHTML.
     *                         </td>
     *                         </tr>
     *                         <tr valign="top">
     *                         <td><b>ENT_HTML5</b></td>
     *                         <td>
     *                         Handle code as HTML 5.
     *                         </td>
     *                         </tr>
     *                         </table>
     *                         </p>
     * @param string $encoding [optional] <p>Encoding to use.</p>
     *
     * @return string <p>The decoded string.</p>
     */
    public static function html_entity_decode($str, $flags = null, $encoding = 'UTF-8') {
        if (!isset($str[0])) {
            return '';
        }

        if (!isset($str[3])) { // examples: &; || &x;
            return $str;
        }

        if (
            \strpos($str, '&') === false
            ||
            (
                \strpos($str, '&#') === false
                &&
                \strpos($str, ';') === false
            )
        ) {
            return $str;
        }

        if ($encoding !== 'UTF-8') {
            $encoding = self::normalize_encoding($encoding, 'UTF-8');
        }

        if ($flags === null) {
            $flags = ENT_QUOTES | ENT_HTML5;
        }

        if (
            $encoding !== 'UTF-8'
            &&
            $encoding !== 'WINDOWS-1252'
            &&
            self::$SUPPORT['mbstring'] === false
        ) {
            \trigger_error('StringLib::html_entity_decode() without mbstring cannot handle "' . $encoding . '" encoding', E_USER_WARNING);
        }

        do {
            $str_compare = $str;
            $str = (string)\preg_replace_callback(
                "/&#\d{2,6};/",
                function ($matches) use ($encoding) {
                    $returnTmp = \mb_convert_encoding($matches[0], $encoding, 'HTML-ENTITIES');
                    if ($returnTmp !== '"' && $returnTmp !== "'") {
                        return $returnTmp;
                    }

                    return $matches[0];
                },
                $str
            );

            // decode numeric & UTF16 two byte entities
            $str = \html_entity_decode(
                \preg_replace('/(&#(?:x0*[0-9a-f]{2,6}(?![0-9a-f;])|(?:0*\d{2,6}(?![0-9;]))))/iS', '$1;', $str),
                $flags,
                $encoding
            );
        } while ($str_compare !== $str);

        return $str;
    }

    /**
     * Checks whether iconv is available on the server.
     *
     * @return bool <p><strong>true</strong> if available, <strong>false</strong> otherwise.</p>
     */
    public static function iconv_loaded() {
        return \extension_loaded('iconv') ? true : false;
    }

    /**
     * Checks whether intl-char is available on the server.
     *
     * @return bool <p><strong>true</strong> if available, <strong>false</strong> otherwise.</p>
     */
    public static function intlChar_loaded() {
        return \class_exists('IntlChar');
    }

    /**
     * Checks whether intl is available on the server.
     *
     * @return bool <p><strong>true</strong> if available, <strong>false</strong> otherwise.</p>
     */
    public static function intl_loaded() {
        return \extension_loaded('intl');
    }

    /**
     * Checks if a string is 7 bit ASCII.
     *
     * @param string $str <p>The string to check.</p>
     *
     * @return bool <p>
     *              <strong>true</strong> if it is ASCII<br>
     *              <strong>false</strong> otherwise
     *              </p>
     */
    public static function is_ascii($str) {
        if (!isset($str[0])) {
            return true;
        }

        return !\preg_match('/[^\x09\x10\x13\x0A\x0D\x20-\x7E]/', $str);
    }

    /**
     * Check if the input is binary... (is look like a hack).
     *
     * @param mixed $input
     * @param bool  $strict
     *
     * @return bool
     */
    public static function is_binary($input, $strict = false)
    {
        $input = (string)$input;
        if (!isset($input[0])) {
            return false;
        }

        if (\preg_match('~^[01]+$~', $input)) {
            return true;
        }

        $testNull = 0;
        $testLength = \strlen($input);
        if ($testLength) {
            $testNull = \substr_count($input, "\x0");
            if (($testNull / $testLength) > 0.3) {
                return true;
            }
        }

        if (
            $strict === true
            &&
            \class_exists('finfo')
        ) {

            $finfo = new \finfo(FILEINFO_MIME_ENCODING);
            $finfo_encoding = $finfo->buffer($input);
            if ($finfo_encoding && $finfo_encoding === 'binary') {
                return true;
            }


        } else {

            if ($testNull > 0) {
                return true;
            }

        }

        return false;
    }

    /**
     * Reads entire file into a string.
     *
     * WARNING: do not use UTF-8 Option ($convertToUtf8) for binary-files (e.g.: images) !!!
     *
     * @link http://php.net/manual/en/function.file-get-contents.php
     *
     * @param string        $filename         <p>
     *                                        Name of the file to read.
     *                                        </p>
     * @param bool          $use_include_path [optional] <p>
     *                                        Prior to PHP 5, this parameter is called
     *                                        use_include_path and is a bool.
     *                                        As of PHP 5 the FILE_USE_INCLUDE_PATH can be used
     *                                        to trigger include path
     *                                        search.
     *                                        </p>
     * @param resource|null $context          [optional] <p>
     *                                        A valid context resource created with
     *                                        stream_context_create. If you don't need to use a
     *                                        custom context, you can skip this parameter by &null;.
     *                                        </p>
     * @param int|null      $offset           [optional] <p>
     *                                        The offset where the reading starts.
     *                                        </p>
     * @param int|null      $maxLength        [optional] <p>
     *                                        Maximum length of data read. The default is to read until end
     *                                        of file is reached.
     *                                        </p>
     * @param int           $timeout          <p>The time in seconds for the timeout.</p>
     *
     * @param bool          $convertToUtf8    <strong>WARNING!!!</strong> <p>Maybe you can't use this option for e.g.
     *                                        images or pdf, because they used non default utf-8 chars.</p>
     *
     * @return string|false <p>The function returns the read data or false on failure.</p>
     */
    public static function file_get_contents($filename, $use_include_path = false, $context = null, $offset = null, $maxLength = null, $timeout = 10, $convertToUtf8 = true)
    {
        // init
        $filename = \filter_var($filename, FILTER_SANITIZE_STRING);

        if ($timeout && $context === null) {
            $context = \stream_context_create(
                array(
                    'http' =>
                        array(
                            'timeout' => $timeout,
                        ),
                )
            );
        }

        if ($offset === null) {
            $offset = 0;
        }

        if (\is_int($maxLength) === true) {
            $data = \file_get_contents($filename, $use_include_path, $context, $offset, $maxLength);
        } else {
            $data = \file_get_contents($filename, $use_include_path, $context, $offset);
        }

        // return false on error
        if ($data === false) {
            return false;
        }

        if ($convertToUtf8 === true) {
            if (
                self::is_binary($data, true) === true
                &&
                self::is_utf16($data) === false
                &&
                self::is_utf32($data) === false
            ) {
                // do nothing, it's binary and not UTF16 or UTF32
            } else {

                $data = self::encode('UTF-8', $data, false);
                $data = self::cleanup($data);

            }
        }

        return $data;
    }

    /**
     * Clean-up a and show only printable UTF-8 chars at the end  + fix UTF-8 encoding.
     *
     * @param string $str <p>The input string.</p>
     *
     * @return string
     */
    public static function cleanup($str)
    {
        if (!isset($str[0])) {
            return '';
        }

        // fixed ISO <-> UTF-8 Errors
        $str = self::fix_simple_utf8($str);

        // remove all none UTF-8 symbols
        // && remove diamond question mark (�)
        // && remove remove invisible characters (e.g. "\0")
        // && remove BOM
        // && normalize whitespace chars (but keep non-breaking-spaces)
        $str = self::clean(
            $str,
            true,
            true,
            false,
            true,
            true,
            true
        );

        return $str;
    }

    /**
     * Try to fix simple broken UTF-8 strings.
     *
     * INFO: Take a look at "UTF8::fix_utf8()" if you need a more advanced fix for broken UTF-8 strings.
     *
     * If you received an UTF-8 string that was converted from Windows-1252 as it was ISO-8859-1
     * (ignoring Windows-1252 chars from 80 to 9F) use this function to fix it.
     * See: http://en.wikipedia.org/wiki/Windows-1252
     *
     * @param string $str <p>The input string</p>
     *
     * @return string
     */
    public static function fix_simple_utf8($str)
    {
        if (!isset($str[0])) {
            return '';
        }

        static $BROKEN_UTF8_TO_UTF8_KEYS_CACHE = null;
        static $BROKEN_UTF8_TO_UTF8_VALUES_CACHE = null;

        if ($BROKEN_UTF8_TO_UTF8_KEYS_CACHE === null) {
            $BROKEN_UTF8_TO_UTF8_KEYS_CACHE = \array_keys(self::$BROKEN_UTF8_FIX);
            $BROKEN_UTF8_TO_UTF8_VALUES_CACHE = \array_values(self::$BROKEN_UTF8_FIX);
        }

        return \str_replace($BROKEN_UTF8_TO_UTF8_KEYS_CACHE, $BROKEN_UTF8_TO_UTF8_VALUES_CACHE, $str);
    }

    /**
     * Check if the string is UTF-16.
     *
     * @param string $str <p>The input string.</p>
     *
     * @return int|false <p>
     *                   <strong>false</strong> if is't not UTF-16,<br>
     *                   <strong>1</strong> for UTF-16LE,<br>
     *                   <strong>2</strong> for UTF-16BE.
     *                   </p>
     */
    public static function is_utf16($str)
    {
        if (self::is_binary($str) === false) {
            return false;
        }

        // init
        $strChars = array();

        $str = self::remove_bom($str);

        $maybeUTF16LE = 0;
        $test = \mb_convert_encoding($str, 'UTF-8', 'UTF-16LE');
        if ($test) {
            $test2 = \mb_convert_encoding($test, 'UTF-16LE', 'UTF-8');
            $test3 = \mb_convert_encoding($test2, 'UTF-8', 'UTF-16LE');
            if ($test3 === $test) {
                if (\count($strChars) === 0) {
                    $strChars = self::count_chars($str, true);
                }
                foreach (self::count_chars($test3, true) as $test3char => $test3charEmpty) {
                    if (\in_array($test3char, $strChars, true) === true) {
                        $maybeUTF16LE++;
                    }
                }
            }
        }

        $maybeUTF16BE = 0;
        $test = \mb_convert_encoding($str, 'UTF-8', 'UTF-16BE');
        if ($test) {
            $test2 = \mb_convert_encoding($test, 'UTF-16BE', 'UTF-8');
            $test3 = \mb_convert_encoding($test2, 'UTF-8', 'UTF-16BE');
            if ($test3 === $test) {
                if (\count($strChars) === 0) {
                    $strChars = self::count_chars($str, true);
                }
                foreach (self::count_chars($test3, true) as $test3char => $test3charEmpty) {
                    if (\in_array($test3char, $strChars, true) === true) {
                        $maybeUTF16BE++;
                    }
                }
            }
        }

        if ($maybeUTF16BE !== $maybeUTF16LE) {
            if ($maybeUTF16LE > $maybeUTF16BE) {
                return 1;
            }

            return 2;
        }

        return false;
    }

    /**
     * Check if the string is UTF-32.
     *
     * @param string $str
     *
     * @return int|false <p>
     *                   <strong>false</strong> if is't not UTF-32,<br>
     *                   <strong>1</strong> for UTF-32LE,<br>
     *                   <strong>2</strong> for UTF-32BE.
     *                   </p>
     */
    public static function is_utf32($str)
    {
        if (self::is_binary($str) === false) {
            return false;
        }

        // init
        $strChars = array();

        $str = self::remove_bom($str);

        $maybeUTF32LE = 0;
        $test = \mb_convert_encoding($str, 'UTF-8', 'UTF-32LE');
        if ($test) {
            $test2 = \mb_convert_encoding($test, 'UTF-32LE', 'UTF-8');
            $test3 = \mb_convert_encoding($test2, 'UTF-8', 'UTF-32LE');
            if ($test3 === $test) {
                if (\count($strChars) === 0) {
                    $strChars = self::count_chars($str, true);
                }
                foreach (self::count_chars($test3, true) as $test3char => $test3charEmpty) {
                    if (\in_array($test3char, $strChars, true) === true) {
                        $maybeUTF32LE++;
                    }
                }
            }
        }

        $maybeUTF32BE = 0;
        $test = \mb_convert_encoding($str, 'UTF-8', 'UTF-32BE');
        if ($test) {
            $test2 = \mb_convert_encoding($test, 'UTF-32BE', 'UTF-8');
            $test3 = \mb_convert_encoding($test2, 'UTF-8', 'UTF-32BE');
            if ($test3 === $test) {
                if (\count($strChars) === 0) {
                    $strChars = self::count_chars($str, true);
                }
                foreach (self::count_chars($test3, true) as $test3char => $test3charEmpty) {
                    if (\in_array($test3char, $strChars, true) === true) {
                        $maybeUTF32BE++;
                    }
                }
            }
        }

        if ($maybeUTF32BE !== $maybeUTF32LE) {
            if ($maybeUTF32LE > $maybeUTF32BE) {
                return 1;
            }

            return 2;
        }

        return false;
    }

    /**
     * Checks whether the passed string contains only byte sequences that appear valid UTF-8 characters.
     *
     * @see    http://hsivonen.iki.fi/php-utf8/
     *
     * @param string|string[] $str    <p>The string to be checked.</p>
     * @param bool            $strict <p>Check also if the string is not UTF-16 or UTF-32.</p>
     *
     * @return bool
     */
    public static function is_utf8($str, $strict = false) {
        if (\is_array($str) === true) {
            foreach ($str as $k => $v) {
                if (false === self::is_utf8($v, $strict)) {
                    return false;
                }
            }

            return true;
        }

        if (!isset($str[0])) {
            return true;
        }

        if ($strict === true) {
            if (self::is_utf16($str) !== false) {
                return false;
            }

            if (self::is_utf32($str) !== false) {
                return false;
            }
        }

        if (self::pcre_utf8_support() !== true) {
            // If even just the first character can be matched, when the /u
            // modifier is used, then it's valid UTF-8. If the UTF-8 is somehow
            // invalid, nothing at all will match, even if the string contains
            // some valid sequences
            return (\preg_match('/^.{1}/us', $str, $ar) === 1);
        }
        $mState = 0; // cached expected number of octets after the current octet
        // until the beginning of the next UTF8 character sequence
        $mUcs4 = 0; // cached Unicode character
        $mBytes = 1; // cached expected number of octets in the current sequence

        if (!isset(self::$SUPPORT['already_checked_via_portable_utf8'])) {
            self::checkForSupport();
        }

        $len = \strlen($str); // count the bytes
        /** @noinspection ForeachInvariantsInspection */
        for ($i = 0; $i < $len; $i++) {
            $in = self::$ORD[$str[$i]];
            if ($mState === 0) {
                // When mState is zero we expect either a US-ASCII character or a
                // multi-octet sequence.
                if (0 === (0x80 & $in)) {
                    // US-ASCII, pass straight through.
                    $mBytes = 1;
                } elseif (0xC0 === (0xE0 & $in)) {
                    // First octet of 2 octet sequence.
                    $mUcs4 = $in;
                    $mUcs4 = ($mUcs4 & 0x1F) << 6;
                    $mState = 1;
                    $mBytes = 2;
                } elseif (0xE0 === (0xF0 & $in)) {
                    // First octet of 3 octet sequence.
                    $mUcs4 = $in;
                    $mUcs4 = ($mUcs4 & 0x0F) << 12;
                    $mState = 2;
                    $mBytes = 3;
                } elseif (0xF0 === (0xF8 & $in)) {
                    // First octet of 4 octet sequence.
                    $mUcs4 = $in;
                    $mUcs4 = ($mUcs4 & 0x07) << 18;
                    $mState = 3;
                    $mBytes = 4;
                } elseif (0xF8 === (0xFC & $in)) {
                    /* First octet of 5 octet sequence.
                    *
                    * This is illegal because the encoded codepoint must be either
                    * (a) not the shortest form or
                    * (b) outside the Unicode range of 0-0x10FFFF.
                    * Rather than trying to resynchronize, we will carry on until the end
                    * of the sequence and let the later error handling code catch it.
                    */
                    $mUcs4 = $in;
                    $mUcs4 = ($mUcs4 & 0x03) << 24;
                    $mState = 4;
                    $mBytes = 5;
                } elseif (0xFC === (0xFE & $in)) {
                    // First octet of 6 octet sequence, see comments for 5 octet sequence.
                    $mUcs4 = $in;
                    $mUcs4 = ($mUcs4 & 1) << 30;
                    $mState = 5;
                    $mBytes = 6;
                } else {
                    /* Current octet is neither in the US-ASCII range nor a legal first
                     * octet of a multi-octet sequence.
                     */
                    return false;
                }
            } else {
                // When mState is non-zero, we expect a continuation of the multi-octet
                // sequence
                if (0x80 === (0xC0 & $in)) {
                    // Legal continuation.
                    $shift = ($mState - 1) * 6;
                    $tmp = $in;
                    $tmp = ($tmp & 0x0000003F) << $shift;
                    $mUcs4 |= $tmp;
                    /**
                     * End of the multi-octet sequence. mUcs4 now contains the final
                     * Unicode code point to be output
                     */
                    if (0 === --$mState) {
                        /*
                        * Check for illegal sequences and code points.
                        */
                        // From Unicode 3.1, non-shortest form is illegal
                        if (
                            (2 === $mBytes && $mUcs4 < 0x0080) ||
                            (3 === $mBytes && $mUcs4 < 0x0800) ||
                            (4 === $mBytes && $mUcs4 < 0x10000) ||
                            (4 < $mBytes) ||
                            // From Unicode 3.2, surrogate characters are illegal.
                            (($mUcs4 & 0xFFFFF800) === 0xD800) ||
                            // Code points outside the Unicode range are illegal.
                            ($mUcs4 > 0x10FFFF)
                        ) {
                            return false;
                        }
                        // initialize UTF8 cache
                        $mState = 0;
                        $mUcs4 = 0;
                        $mBytes = 1;
                    }
                } else {
                    /**
                     *((0xC0 & (*in) != 0x80) && (mState != 0))
                     * Incomplete multi-octet sequence.
                     */
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Calculates and returns the maximum number of bytes taken by any
     * UTF-8 encoded character in the given string.
     *
     * @param string $str <p>The original Unicode string.</p>
     *
     * @return int <p>Max byte lengths of the given chars.</p>
     */
    public static function max_chr_width($str) {
        $bytes = self::chr_size_list($str);
        if (\count($bytes) > 0) {
            return (int)\max($bytes);
        }

        return 0;
    }

    /**
     * Checks whether mbstring is available on the server.
     *
     * @return bool <p><strong>true</strong> if available, <strong>false</strong> otherwise.</p>
     */
    public static function mbstring_loaded() {
        $return = \extension_loaded('mbstring') ? true : false;
        if ($return === true) {
            \mb_internal_encoding('UTF-8');
        }

        return $return;
    }

    /**
     * @return bool
     */
    private static function mbstring_overloaded() {
        return \defined('MB_OVERLOAD_STRING')
               &&
               \ini_get('mbstring.func_overload') & MB_OVERLOAD_STRING;
    }

    /**
     * Normalize the encoding-"name" input.
     *
     * @param string $encoding <p>e.g.: ISO, UTF8, WINDOWS-1251 etc.</p>
     * @param mixed  $fallback <p>e.g.: UTF-8</p>
     *
     * @return string <p>e.g.: ISO-8859-1, UTF-8, WINDOWS-1251 etc.<br>Will return a empty string as fallback (by
     *                default)</p>
     */
    public static function normalize_encoding($encoding, $fallback = '') {
        static $STATIC_NORMALIZE_ENCODING_CACHE = array();

        if (!$encoding) {
            return $fallback;
        }

        if (
            'UTF-8' === $encoding
            ||
            'UTF8' === $encoding
        ) {
            return 'UTF-8';
        }

        if (isset($STATIC_NORMALIZE_ENCODING_CACHE[$encoding])) {
            return $STATIC_NORMALIZE_ENCODING_CACHE[$encoding];
        }

        if (\in_array($encoding, self::$ENCODINGS, true)) {
            $STATIC_NORMALIZE_ENCODING_CACHE[$encoding] = $encoding;

            return $encoding;
        }

        $encodingOrig = $encoding;
        $encoding = \strtoupper($encoding);
        $encodingUpperHelper = \preg_replace('/[^a-zA-Z0-9\s]/', '', $encoding);
        $equivalences = array(
            'ISO8859'     => 'ISO-8859-1',
            'ISO88591'    => 'ISO-8859-1',
            'ISO'         => 'ISO-8859-1',
            'LATIN'       => 'ISO-8859-1',
            'LATIN1'      => 'ISO-8859-1', // Western European
            'ISO88592'    => 'ISO-8859-2',
            'LATIN2'      => 'ISO-8859-2', // Central European
            'ISO88593'    => 'ISO-8859-3',
            'LATIN3'      => 'ISO-8859-3', // Southern European
            'ISO88594'    => 'ISO-8859-4',
            'LATIN4'      => 'ISO-8859-4', // Northern European
            'ISO88595'    => 'ISO-8859-5',
            'ISO88596'    => 'ISO-8859-6', // Greek
            'ISO88597'    => 'ISO-8859-7',
            'ISO88598'    => 'ISO-8859-8', // Hebrew
            'ISO88599'    => 'ISO-8859-9',
            'LATIN5'      => 'ISO-8859-9', // Turkish
            'ISO885911'   => 'ISO-8859-11',
            'TIS620'      => 'ISO-8859-11', // Thai
            'ISO885910'   => 'ISO-8859-10',
            'LATIN6'      => 'ISO-8859-10', // Nordic
            'ISO885913'   => 'ISO-8859-13',
            'LATIN7'      => 'ISO-8859-13', // Baltic
            'ISO885914'   => 'ISO-8859-14',
            'LATIN8'      => 'ISO-8859-14', // Celtic
            'ISO885915'   => 'ISO-8859-15',
            'LATIN9'      => 'ISO-8859-15', // Western European (with some extra chars e.g. €)
            'ISO885916'   => 'ISO-8859-16',
            'LATIN10'     => 'ISO-8859-16', // Southeast European
            'CP1250'      => 'WINDOWS-1250',
            'WIN1250'     => 'WINDOWS-1250',
            'WINDOWS1250' => 'WINDOWS-1250',
            'CP1251'      => 'WINDOWS-1251',
            'WIN1251'     => 'WINDOWS-1251',
            'WINDOWS1251' => 'WINDOWS-1251',
            'CP1252'      => 'WINDOWS-1252',
            'WIN1252'     => 'WINDOWS-1252',
            'WINDOWS1252' => 'WINDOWS-1252',
            'CP1253'      => 'WINDOWS-1253',
            'WIN1253'     => 'WINDOWS-1253',
            'WINDOWS1253' => 'WINDOWS-1253',
            'CP1254'      => 'WINDOWS-1254',
            'WIN1254'     => 'WINDOWS-1254',
            'WINDOWS1254' => 'WINDOWS-1254',
            'CP1255'      => 'WINDOWS-1255',
            'WIN1255'     => 'WINDOWS-1255',
            'WINDOWS1255' => 'WINDOWS-1255',
            'CP1256'      => 'WINDOWS-1256',
            'WIN1256'     => 'WINDOWS-1256',
            'WINDOWS1256' => 'WINDOWS-1256',
            'CP1257'      => 'WINDOWS-1257',
            'WIN1257'     => 'WINDOWS-1257',
            'WINDOWS1257' => 'WINDOWS-1257',
            'CP1258'      => 'WINDOWS-1258',
            'WIN1258'     => 'WINDOWS-1258',
            'WINDOWS1258' => 'WINDOWS-1258',
            'UTF16'       => 'UTF-16',
            'UTF32'       => 'UTF-32',
            'UTF8'        => 'UTF-8',
            'UTF'         => 'UTF-8',
            'UTF7'        => 'UTF-7',
            '8BIT'        => 'CP850',
            'BINARY'      => 'CP850',
        );

        if (!empty($equivalences[$encodingUpperHelper])) {
            $encoding = $equivalences[$encodingUpperHelper];
        }
        $STATIC_NORMALIZE_ENCODING_CACHE[$encodingOrig] = $encoding;

        return $encoding;
    }

    /**
     * Normalize some MS Word special characters.
     *
     * @param string $str <p>The string to be normalized.</p>
     *
     * @return string
     */
    public static function normalize_msword($str) {
        if (!isset($str[0])) {
            return '';
        }

        static $UTF8_MSWORD_KEYS_CACHE = null;
        static $UTF8_MSWORD_VALUES_CACHE = null;

        if ($UTF8_MSWORD_KEYS_CACHE === null) {
            $UTF8_MSWORD_KEYS_CACHE = \array_keys(self::$UTF8_MSWORD);
            $UTF8_MSWORD_VALUES_CACHE = \array_values(self::$UTF8_MSWORD);
        }

        return \str_replace($UTF8_MSWORD_KEYS_CACHE, $UTF8_MSWORD_VALUES_CACHE, $str);
    }

    /**
     * Normalize the whitespace.
     *
     * @param string $str                     <p>The string to be normalized.</p>
     * @param bool   $keepNonBreakingSpace    [optional] <p>Set to true, to keep non-breaking-spaces.</p>
     * @param bool   $keepBidiUnicodeControls [optional] <p>Set to true, to keep non-printable (for the web)
     *                                        bidirectional text chars.</p>
     *
     * @return string
     */
    public static function normalize_whitespace($str, $keepNonBreakingSpace = false, $keepBidiUnicodeControls = false) {
        if (!isset($str[0])) {
            return '';
        }

        static $WHITESPACE_CACHE = array();
        $cacheKey = (int)$keepNonBreakingSpace;
        if (!isset($WHITESPACE_CACHE[$cacheKey])) {
            $WHITESPACE_CACHE[$cacheKey] = self::$WHITESPACE_TABLE;
            if ($keepNonBreakingSpace === true) {
                unset($WHITESPACE_CACHE[$cacheKey]['NO-BREAK SPACE']);
            }
            $WHITESPACE_CACHE[$cacheKey] = \array_values($WHITESPACE_CACHE[$cacheKey]);
        }

        if ($keepBidiUnicodeControls === false) {
            static $BIDI_UNICODE_CONTROLS_CACHE = null;
            if ($BIDI_UNICODE_CONTROLS_CACHE === null) {
                $BIDI_UNICODE_CONTROLS_CACHE = \array_values(self::$BIDI_UNI_CODE_CONTROLS_TABLE);
            }
            $str = \str_replace($BIDI_UNICODE_CONTROLS_CACHE, '', $str);
        }

        return \str_replace($WHITESPACE_CACHE[$cacheKey], ' ', $str);
    }

    /**
     * Calculates Unicode code point of the given UTF-8 encoded character.
     *
     * INFO: opposite to StringLib::chr()
     *
     * @param string $chr      <p>The character of which to calculate code point.<p/>
     * @param string $encoding [optional] <p>Default is UTF-8</p>
     *
     * @return int <p>
     *             Unicode code point of the given character,<br>
     *             0 on invalid UTF-8 byte sequence.
     *             </p>
     */
    public static function ord($chr, $encoding = 'UTF-8') {
        // init
        static $CHAR_CACHE = array();

        // save the original string
        $chr_orig = $chr;
        if ($encoding !== 'UTF-8') {
            $encoding = self::normalize_encoding($encoding, 'UTF-8');
            // check again, if it's still not UTF-8
            /** @noinspection NotOptimalIfConditionsInspection */
            if ($encoding !== 'UTF-8') {
                $chr = (string)\mb_convert_encoding($chr, 'UTF-8', $encoding);
            }
        }

        $cacheKey = $chr_orig . $encoding;
        if (isset($CHAR_CACHE[$cacheKey]) === true) {
            return $CHAR_CACHE[$cacheKey];
        }

        if (!isset(self::$SUPPORT['already_checked_via_portable_utf8'])) {
            self::checkForSupport();
        }

        if (self::$SUPPORT['intlChar'] === true) {
            $code = \IntlChar::ord($chr);
            if ($code) {
                return $CHAR_CACHE[$cacheKey] = $code;
            }
        }

        /** @noinspection CallableParameterUseCaseInTypeContextInspection */
        $chr = \unpack('C*', (string)\mb_substr($chr, 0, 4, '8BIT'));
        $code = $chr ? $chr[1] : 0;

        if (0xF0 <= $code && isset($chr[4])) {
            return $CHAR_CACHE[$cacheKey] = (($code - 0xF0) << 18) + (($chr[2] - 0x80) << 12) + (($chr[3] - 0x80) << 6) + $chr[4] - 0x80;
        }

        if (0xE0 <= $code && isset($chr[3])) {
            return $CHAR_CACHE[$cacheKey] = (($code - 0xE0) << 12) + (($chr[2] - 0x80) << 6) + $chr[3] - 0x80;
        }

        if (0xC0 <= $code && isset($chr[2])) {
            return $CHAR_CACHE[$cacheKey] = (($code - 0xC0) << 6) + $chr[2] - 0x80;
        }

        return $CHAR_CACHE[$cacheKey] = $code;
    }

    /**
     * Checks if \u modifier is available that enables Unicode support in PCRE.
     *
     * @return bool <p><strong>true</strong> if support is available, <strong>false</strong> otherwise.</p>
     */
    public static function pcre_utf8_support() {
        /** @noinspection PhpUsageOfSilenceOperatorInspection */
        return (bool)@\preg_match('//u', '');
    }

    /**
     * Remove the BOM from UTF-8 / UTF-16 / UTF-32 strings.
     *
     * @param string $str <p>The input string.</p>
     *
     * @return string <p>String without UTF-BOM</p>
     */
    public static function remove_bom($str) {
        if (!isset($str[0])) {
            return '';
        }

        foreach (self::$BOM as $bomString => $bomByteLength) {
            if (0 === \mb_strpos($str, $bomString, 0, '8BIT')) {
                $strTmp = \mb_substr($str, $bomByteLength, null, '8BIT');
                if ($strTmp === false) {
                    $strTmp = '';
                }
                $str = (string)$strTmp;
            }
        }

        return $str;
    }

    /**
     * Remove invisible characters from a string.
     *
     * e.g.: This prevents sandwiching null characters between ascii characters, like Java\0script.
     *
     * copy&past from https://github.com/bcit-ci/CodeIgniter/blob/develop/system/core/Common.php
     *
     * @param string $str
     * @param bool   $url_encoded
     * @param string $replacement
     *
     * @return string
     */
    public static function remove_invisible_characters($str, $url_encoded = true, $replacement = '') {
        // init
        $non_displayables = array();

        // every control character except newline (dec 10),
        // carriage return (dec 13) and horizontal tab (dec 09)
        if ($url_encoded) {
            $non_displayables[] = '/%0[0-8bcef]/'; // url encoded 00-08, 11, 12, 14, 15
            $non_displayables[] = '/%1[0-9a-f]/'; // url encoded 16-31
        }
        $non_displayables[] = '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S'; // 00-08, 11, 12, 14-31, 127

        do {
            $str = (string)\preg_replace($non_displayables, $replacement, $str, -1, $count);
        } while ($count !== 0);

        return $str;
    }

    /**
     * Replace the diamond question mark (�) and invalid-UTF8 chars with the replacement.
     *
     * @param string $str                <p>The input string</p>
     * @param string $replacementChar    <p>The replacement character.</p>
     * @param bool   $processInvalidUtf8 <p>Convert invalid UTF-8 chars </p>
     *
     * @return string
     */
    public static function replace_diamond_question_mark($str, $replacementChar = '', $processInvalidUtf8 = true) {
        if (!isset($str[0])) {
            return '';
        }

        if ($processInvalidUtf8 === true) {

            $replacementCharHelper = $replacementChar;
            if ($replacementChar === '') {
                $replacementCharHelper = 'none';
            }

            if (!isset(self::$SUPPORT['already_checked_via_portable_utf8'])) {
                self::checkForSupport();
            }

            $save = \mb_substitute_character();
            \mb_substitute_character($replacementCharHelper);
            $strTmp = \mb_convert_encoding($str, 'UTF-8', 'UTF-8');
            \mb_substitute_character($save);

            if (\is_string($strTmp)) {
                $str = $strTmp;
            } else {
                $str = '';
            }
        }

        return str_replace(
            array(
                "\xEF\xBF\xBD",
                '�',
            ),
            array(
                $replacementChar,
                $replacementChar,
            ),
            $str
        );
    }

    /**
     * Converts a UTF-8 character to HTML Numbered Entity like "&#123;".
     *
     * @param string $char           <p>The Unicode character to be encoded as numbered entity.</p>
     * @param bool   $keepAsciiChars <p>Set to <strong>true</strong> to keep ASCII chars.</>
     * @param string $encoding       [optional] <p>Default is UTF-8</p>
     *
     * @return string <p>The HTML numbered entity.</p>
     */
    public static function single_chr_html_encode($char, $keepAsciiChars = false, $encoding = 'UTF-8') {
        if (!isset($char[0])) {
            return '';
        }

        if (
            $keepAsciiChars === true
            &&
            self::is_ascii($char) === true
        ) {
            return $char;
        }

        if ($encoding !== 'UTF-8') {
            $encoding = self::normalize_encoding($encoding, 'UTF-8');
        }

        return '&#' . self::ord($char, $encoding) . ';';
    }

    /**
     * Convert a string to an array of Unicode characters.
     *
     * @param string $str       <p>The string to split into array.</p>
     * @param int    $length    [optional] <p>Max character length of each array element.</p>
     * @param bool   $cleanUtf8 [optional] <p>Remove non UTF-8 chars from the string.</p>
     *
     * @return string[] <p>An array containing chunks of the string.</p>
     */
    public static function split($str, $length = 1, $cleanUtf8 = false) {
        if (!isset($str[0])) {
            return array();
        }

        // init
        $ret = array();
        if (!isset(self::$SUPPORT['already_checked_via_portable_utf8'])) {
            self::checkForSupport();
        }

        if ($cleanUtf8 === true) {
            $str = self::clean($str);
        }

        if (self::$SUPPORT['pcre_utf8'] === true) {

            \preg_match_all('/./us', $str, $retArray);
            if (isset($retArray[0])) {
                $ret = $retArray[0];
            }
            unset($retArray);

        } else {

            // fallback
            if (!isset(self::$SUPPORT['already_checked_via_portable_utf8'])) {
                self::checkForSupport();
            }

            $len = \strlen($str); // count the bytes
            /** @noinspection ForeachInvariantsInspection */
            for ($i = 0; $i < $len; $i++) {
                if (($str[$i] & "\x80") === "\x00") {
                    $ret[] = $str[$i];
                } elseif (
                    isset($str[$i + 1])
                    &&
                    ($str[$i] & "\xE0") === "\xC0"
                ) {
                    if (($str[$i + 1] & "\xC0") === "\x80") {
                        $ret[] = $str[$i] . $str[$i + 1];
                        $i++;
                    }
                } elseif (
                    isset($str[$i + 2])
                    &&
                    ($str[$i] & "\xF0") === "\xE0"
                ) {
                    if (
                        ($str[$i + 1] & "\xC0") === "\x80"
                        &&
                        ($str[$i + 2] & "\xC0") === "\x80"
                    ) {
                        $ret[] = $str[$i] . $str[$i + 1] . $str[$i + 2];
                        $i += 2;
                    }
                } elseif (
                    isset($str[$i + 3])
                    &&
                    ($str[$i] & "\xF8") === "\xF0"
                ) {
                    if (
                        ($str[$i + 1] & "\xC0") === "\x80"
                        &&
                        ($str[$i + 2] & "\xC0") === "\x80"
                        &&
                        ($str[$i + 3] & "\xC0") === "\x80"
                    ) {
                        $ret[] = $str[$i] . $str[$i + 1] . $str[$i + 2] . $str[$i + 3];
                        $i += 3;
                    }
                }
            }
        }

        if ($length > 1) {
            $ret = \array_chunk($ret, $length);

            return \array_map(
                function ($item) {
                    return \implode('', $item);
                }, $ret
            );
        }

        if (isset($ret[0]) && $ret[0] === '') {
            return array();
        }

        return $ret;
    }

    /**
     * Optimized "\mb_detect_encoding()"-function -> with support for UTF-16 and UTF-32.
     *
     * @param string $str <p>The input string.</p>
     *
     * @return false|string <p>
     *                      The detected string-encoding e.g. UTF-8 or UTF-16BE,<br>
     *                      otherwise it will return false.
     *                      </p>
     */
    public static function str_detect_encoding($str)
    {
        //
        // 1.) check binary strings (010001001...) like UTF-16 / UTF-32
        //

        if (self::is_binary($str, true) === true) {

            if (self::is_utf16($str) === 1) {
                return 'UTF-16LE';
            }

            if (self::is_utf16($str) === 2) {
                return 'UTF-16BE';
            }

            if (self::is_utf32($str) === 1) {
                return 'UTF-32LE';
            }

            if (self::is_utf32($str) === 2) {
                return 'UTF-32BE';
            }

            return false;
        }

        //
        // 2.) simple check for ASCII chars
        //

        if (self::is_ascii($str) === true) {
            return 'ASCII';
        }

        //
        // 3.) simple check for UTF-8 chars
        //

        if (self::is_utf8($str) === true) {
            return 'UTF-8';
        }



        //
        // 5.) check via "iconv()"
        //

        $md5 = \md5($str);
        foreach (self::$ENCODINGS as $encodingTmp) {
            # INFO: //IGNORE and //TRANSLIT still throw notice
            /** @noinspection PhpUsageOfSilenceOperatorInspection */
            if (\md5(@\iconv($encodingTmp, $encodingTmp . '//IGNORE', $str)) === $md5) {
                return $encodingTmp;
            }
        }

                //
        // 4.) check via "\mb_detect_encoding()"
        //
        // INFO: UTF-16, UTF-32, UCS2 and UCS4, encoding detection will fail always with "\mb_detect_encoding()"

        $detectOrder = array(
            'ISO-8859-1',
            'ISO-8859-2',
            'ISO-8859-3',
            'ISO-8859-4',
            'ISO-8859-5',
            'ISO-8859-6',
            'ISO-8859-7',
            'ISO-8859-8',
            'ISO-8859-9',
            'ISO-8859-10',
            'ISO-8859-13',
            'ISO-8859-14',
            'ISO-8859-15',
            'ISO-8859-16',
            'WINDOWS-1251',
            'WINDOWS-1252',
            'WINDOWS-1254',
            'ISO-2022-JP',
            'JIS',
            'EUC-JP',
        );

        $encoding = \mb_detect_encoding($str, $detectOrder, true);
        if ($encoding) {
            return $encoding;
        }

        return false;
    }

    /**
     * This function leaves UTF-8 characters alone, while converting almost all non-UTF8 to UTF8.
     *
     * <ul>
     * <li>It decode UTF-8 codepoints and unicode escape sequences.</li>
     * <li>It assumes that the encoding of the original string is either WINDOWS-1252 or ISO-8859.</li>
     * <li>WARNING: It does not remove invalid UTF-8 characters, so you maybe need to use "StringLib::clean()" for this
     * case.</li>
     * </ul>
     *
     * @param string|string[] $str                    <p>Any string or array.</p>
     * @param bool            $decodeHtmlEntityToUtf8 <p>Set to true, if you need to decode html-entities.</p>
     *
     * @return string|string[] <p>The UTF-8 encoded string.</p>
     */
    public static function to_utf8($str, $decodeHtmlEntityToUtf8 = false) {
        if (\is_array($str) === true) {
            foreach ($str as $k => $v) {
                $str[$k] = self::to_utf8($v, $decodeHtmlEntityToUtf8);
            }

            return $str;
        }

        $str = (string)$str;
        if (!isset($str[0])) {
            return $str;
        }

        if (!isset(self::$SUPPORT['already_checked_via_portable_utf8'])) {
            self::checkForSupport();
        }

        $max = \strlen($str); // count the bytes
        $buf = '';
        /** @noinspection ForeachInvariantsInspection */
        for ($i = 0; $i < $max; $i++) {
            $c1 = $str[$i];
            if ($c1 >= "\xC0") { // should be converted to UTF8, if it's not UTF8 already
                if ($c1 <= "\xDF") { // looks like 2 bytes UTF8
                    $c2 = $i + 1 >= $max ? "\x00" : $str[$i + 1];
                    if ($c2 >= "\x80" && $c2 <= "\xBF") { // yeah, almost sure it's UTF8 already
                        $buf .= $c1 . $c2;
                        $i++;
                    } else { // not valid UTF8 - convert it
                        $buf .= self::to_utf8_convert($c1);
                    }
                } elseif ($c1 >= "\xE0" && $c1 <= "\xEF") { // looks like 3 bytes UTF8
                    $c2 = $i + 1 >= $max ? "\x00" : $str[$i + 1];
                    $c3 = $i + 2 >= $max ? "\x00" : $str[$i + 2];
                    if ($c2 >= "\x80" && $c2 <= "\xBF" && $c3 >= "\x80" && $c3 <= "\xBF") { // yeah, almost sure it's UTF8 already
                        $buf .= $c1 . $c2 . $c3;
                        $i += 2;
                    } else { // not valid UTF8 - convert it
                        $buf .= self::to_utf8_convert($c1);
                    }
                } elseif ($c1 >= "\xF0" && $c1 <= "\xF7") { // looks like 4 bytes UTF8
                    $c2 = $i + 1 >= $max ? "\x00" : $str[$i + 1];
                    $c3 = $i + 2 >= $max ? "\x00" : $str[$i + 2];
                    $c4 = $i + 3 >= $max ? "\x00" : $str[$i + 3];
                    if ($c2 >= "\x80" && $c2 <= "\xBF" && $c3 >= "\x80" && $c3 <= "\xBF" && $c4 >= "\x80" && $c4 <= "\xBF") { // yeah, almost sure it's UTF8 already
                        $buf .= $c1 . $c2 . $c3 . $c4;
                        $i += 3;
                    } else { // not valid UTF8 - convert it
                        $buf .= self::to_utf8_convert($c1);
                    }
                } else { // doesn't look like UTF8, but should be converted
                    $buf .= self::to_utf8_convert($c1);
                }
            } elseif (($c1 & "\xC0") === "\x80") { // needs conversion
                $buf .= self::to_utf8_convert($c1);
            } else { // it doesn't need conversion
                $buf .= $c1;
            }
        }

        // decode unicode escape sequences
        $buf = \preg_replace_callback(
            '/\\\\u([0-9a-f]{4})/i',
            function ($match) {
                return \mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
            },
            $buf
        );

        // decode UTF-8 codepoints
        if ($decodeHtmlEntityToUtf8 === true) {
            $buf = self::html_entity_decode($buf);
        }

        return $buf;
    }

    /**
     * @param int $int
     *
     * @return string
     */
    private static function to_utf8_convert($int) {
        // init
        $buf = '';

        $ordC1 = self::$ORD[$int];
        if (isset(self::$WIN1252_TO_UTF8[$ordC1])) { // found in Windows-1252 special cases
            $buf .= self::$WIN1252_TO_UTF8[$ordC1];
        } else {
            $cc1 = self::$CHR[$ordC1 / 64] | "\xC0";
            $cc2 = ($int & "\x3F") | "\x80";
            $buf .= $cc1 . $cc2;
        }

        return $buf;
    }

    /**
     * Decodes an UTF-8 string to ISO-8859-1.
     *
     * @param string $str <p>The input string.</p>
     * @param bool   $keepUtf8Chars
     *
     * @return string
     */
    public static function utf8_decode($str, $keepUtf8Chars = false) {
        if (!isset($str[0])) {
            return '';
        }

        static $UTF8_TO_WIN1252_KEYS_CACHE = null;
        static $UTF8_TO_WIN1252_VALUES_CACHE = null;

        if ($UTF8_TO_WIN1252_KEYS_CACHE === null) {
            $UTF8_TO_WIN1252_KEYS_CACHE = \array_keys(self::$WIN1252_TO_UTF8);
            $UTF8_TO_WIN1252_VALUES_CACHE = \array_values(self::$WIN1252_TO_UTF8);
        }

        /** @noinspection PhpInternalEntityUsedInspection */
        $str = \str_replace($UTF8_TO_WIN1252_KEYS_CACHE, $UTF8_TO_WIN1252_VALUES_CACHE, $str);
        if (!isset(self::$SUPPORT['already_checked_via_portable_utf8'])) {
            self::checkForSupport();
        }

        // save for later comparision
        $str_backup = $str;
        $len = \strlen($str); // count the bytes
        $noCharFound = '?';
        /** @noinspection ForeachInvariantsInspection */
        for ($i = 0, $j = 0; $i < $len; ++$i, ++$j) {
            switch ($str[$i] & "\xF0") {
                case "\xC0":
                case "\xD0":
                    $c = (self::$ORD[$str[$i] & "\x1F"] << 6) | self::$ORD[$str[++$i] & "\x3F"];
                    $str[$j] = $c < 256 ? self::$CHR[$c] : $noCharFound;
                    break;
                /** @noinspection PhpMissingBreakStatementInspection */
                case "\xF0":
                    ++$i;
                case "\xE0":
                    $str[$j] = $noCharFound;
                    $i += 2;
                    break;
                default:
                    $str[$j] = $str[$i];
            }
        }

        $return = (string)\mb_substr($str, 0, $j, '8BIT');
        if (
            $keepUtf8Chars === true
            &&
            \mb_strlen($return) >= \mb_strlen($str_backup)
        ) {
            return $str_backup;
        }

        return $return;
    }
}

