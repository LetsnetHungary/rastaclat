<?php

  namespace CoreApp;

  class CMS {

    private static $mapB = "_cms/_maps/";
    private static $jsonB = "_cms/_jsons/";

    public static function getSection($viewName, $sectionName) {
      $cmsMapFile = self::$mapB."/map.$viewName.json";
      $content = json_decode(file_get_contents($cmsMapFile));

      $sectionFile = self::$jsonB."/$viewName/$sectionName.json";
      return(self::GS($sectionFile));
    }

    private static function GS($sectionFile) {
     $content = file_get_contents($sectionFile);
     return(json_decode($content));
   }
 }
