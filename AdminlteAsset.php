<?php

namespace modernkernel\themeadminlte;

use Exception;
use Yii;
use yii\web\AssetBundle;

/**
 * Class AdminlteAsset
 * @package modernkernel\themeadminlte
 */
class AdminlteAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/dist';
    public $css = [
        'css/AdminLTE.min.css',
    ];
    public $js = [
        'js/app.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'common\plugins\fastclick\FastclickAsset'
    ];

    public function init()
    {

        parent::init(); // TODO: Change the autogenerated stub

        // Append skin color file if specified
        $skin = Yii::$app->view->theme->skin;
        if ($skin) {
            if (('_all-skins' !== $skin) && (strpos($skin, 'skin-') !== 0)) {
                throw new Exception('Invalid skin specified');
            }
            if(file_exists($this->sourcePath.'/'.sprintf('css/skins/%s.min.css', $skin))){
                $this->css[] = sprintf('css/skins/%s.min.css', $skin);
            }
        }
        // fixed layout requires the slimscroll plugin!
        $layout = Yii::$app->view->theme->layout;
        if(preg_match('/fixed/', $layout)){

            $this->depends=array_merge($this->depends, ['common\plugins\slimscroll\SlimscrollAsset']);
            //$this->js[]='https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js';
        }


    }
}
