<?php
/**
 * LoremIpsum class
 * @author Rainer Schulz
 */
class LoremIpsum
{
    private const LOREM_IPSUM_API_URI = 'http://loripsum.net/api/plaintext/short/';
    private const LOREM_IPSUM_BACKUP  = 'Lorem ipsum dolor sit amet, consectetu'
        . 'r adipiscing elit, sed do eiusmod tempor incididunt ut labore et dol'
        . 'ore magna aliqua.' . PHP_EOL;

    /**
     * Gets a placeholder text from loripsum.net.
     *
     * @param  integer $iParagraphs number of paragraphs
     * @param  string  $sPClass     css class for p tags
     * @param  boolean $bAddPTags   use p tags?
     * @param  boolean $bPrude      prude API call?
     *
     * @return string               lorem ipsum text
     */
    public static function get(
        int    $iParagraphs = 1,
        string $sPClass     = null,
        bool   $bAddPTags   = true,
        bool   $bPrude      = true
    ): string {
        $aParams = [];

        if (1 > $iParagraphs) {
            $iParagraphs = 1;
        }

        $aParams[] = $iParagraphs;

        if (true === $bPrude) {
            $aParams[] = 'prude';
        }

        $rCurl = curl_init();

        curl_setopt($rCurl, CURLOPT_URL, self::LOREM_IPSUM_API_URI . implode('/', $aParams));
        curl_setopt($rCurl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($rCurl, CURLOPT_CONNECTTIMEOUT, 5);

        $sLorem = curl_exec($rCurl);

        curl_close($rCurl);

        if (false === $sLorem) {
            $sLorem = '';

            for ($i = 0; $i < $iParagraphs; ++$i) {
                $sLorem .= self::LOREM_IPSUM_BACKUP;
            }
        }

        if (true === $bAddPTags) {
            $sCss   = $sPClass ? ' class="' . $sPClass . '"' : '';
            $sLorem = "<p{$sCss}>" . preg_replace(
                '#(\r\n|\n)+#',
                "</p><p{$sCss}>",
                trim($sLorem)
            ) . '</p>';
        }

        return $sLorem;
    }
}
