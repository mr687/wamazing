<?php

namespace Mr687\Wamazing\Traits;

use Illuminate\Support\Str;

trait Serialize
{
  public function phoneSerialize($phoneNumber)
  {
    if (!$phoneNumber) return null;
    $string = Str::of($phoneNumber);
    $replaces = [
      '08' => '628',
      '+62' => '62',
      '8' => '628'
    ];
    foreach ($replaces as $key => $value) {
      if ($string->startsWith($key))
        $string = $string->replaceFirst($key, $value);
    }
    return $string;
  }

  public function htmlSerialize($html)
  {
    if (!$html) return '';
    return Str::of($html)
      ->replaceMatches('/<b>|<\/b>|<strong>|<\/strong>/', '*') // BOLD
      ->replaceMatches('/<div>|<p>|<article>|<section>|<br>|<br\/>/', '\n')    // LINE BREAK
      ->replaceMatches('/<\/div>|<\/p>|<\/article>|<\/section>/', '')
      ->replaceMatches('/<i>|<\/i>/', '_') // Italic
      ->replaceMatches('/<strike>|<\/strike>/', '~')
      ->replaceMatches('/<font face="monospace" style="">|<font face="monospace">|<\/font>/', '```')
      ->replaceMatches('/<[^>]*>/', ""); // Strike Through
  }
}
