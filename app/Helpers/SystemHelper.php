<?php
namespace App\Helpers;

class SystemHelper
{
    public function exec($cmd, $input = '')
    {
        $proc = proc_open($cmd, array(0 => array('pipe', 'r'), 1 => array('pipe', 'w'), 2 => array('pipe', 'w')), $pipes);
        fwrite($pipes[0], $input);
        fclose($pipes[0]);
        $stdout = stream_get_contents($pipes[1]);
        fclose($pipes[1]);
        $stderr = stream_get_contents($pipes[2]);
        fclose($pipes[2]);
        $rtn = proc_close($proc);
        return array(
            'stdout' => $stdout,
            'stderr' => $stderr,
            'return' => $rtn
        );
    }

    public function whichJekyll()
    {
        $out = $this->exec("which jekyll");

        /*if ($stdOut = array_get($out, 'stdout')) {
            if (strpos($stdOut, '/bin/') > 0) {
                return str_replace('/bin/', '/wrappers/', $stdOut);
            }
        }*/

        return $out;
    }
}