<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/3/5
 * Time: 下午1:09
 */

namespace app\console;

use think\console\Command;
use think\console\Input;
use think\console\input\Option;
use think\console\Output;


/**
 * 一个合法的指令类，没有固定的目录和命名空间要求，
 * 但必须继承think\console\command\Command或者其子类，
 * 并且定义configure和execute两个方法。
 *
 */

class Clear extends Command
{


    protected function configure(){
        // 指令配置
        $this
        ->setName('clear')
            ->addOption('path', 'd', Option::VALUE_OPTIONAL, 'path to clear', null)
            ->setDescription('Clear runtime file');
    }

    protected function execute(Input $input, Output $output){
        $path  = $input->getOption('path') ?: RUNTIME_PATH;
        $files = scandir($path);
        if ($files) {
            foreach ($files as $file) {
                if ('.' != $file && '..' != $file && is_dir($path . $file)) {
                    array_map('unlink', glob($path . $file . '/*.*'));
                } elseif (is_file($path . $file)) {
                    unlink($path . $file);
                }
            }
        }
        $output->writeln("Clear Successed");
    }
}