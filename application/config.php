<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    // +----------------------------------------------------------------------
    // | 应用设置
    // +----------------------------------------------------------------------

    // 应用命名空间
    'app_namespace'          => 'app',
    // 应用调试模式
    'app_debug'              => true,
    // 应用Trace
    'app_trace'              => false,
    // 应用模式状态
    'app_status'             => '',
    // 是否支持多模块
    'app_multi_module'       => true,
    // 入口自动绑定模块
    'auto_bind_module'       => false,
    // 注册的根命名空间
    'root_namespace'         => [],
    // 扩展函数文件
    'extra_file_list'        => [THINK_PATH . 'helper' . EXT],
    // 默认输出类型
    'default_return_type'    => 'html',
    // 默认AJAX 数据返回格式,可选json xml ...
    'default_ajax_return'    => 'json',
    // 默认JSONP格式返回的处理方法
    'default_jsonp_handler'  => 'jsonpReturn',
    // 默认JSONP处理方法
    'var_jsonp_handler'      => 'callback',
    // 默认时区
    'default_timezone'       => 'PRC',
    // 是否开启多语言
    'lang_switch_on'         => false,
    // 默认全局过滤方法 用逗号分隔多个
    'default_filter'         => '',
    // 默认语言
    'default_lang'           => 'zh-cn',
    // 应用类库后缀
    'class_suffix'           => false,
    // 控制器类后缀
    'controller_suffix'      => false,

    // +----------------------------------------------------------------------
    // | 模块设置
    // +----------------------------------------------------------------------

    // 默认模块名
    'default_module'         => 'index',
    // 禁止访问模块
    'deny_module_list'       => ['common'],
    // 默认控制器名
    'default_controller'     => 'Index',
    // 默认操作名
    'default_action'         => 'index',
    // 默认验证器
    'default_validate'       => '',
    // 默认的空控制器名
    'empty_controller'       => 'Error',
    // 操作方法后缀
    'action_suffix'          => '',
    // 自动搜索控制器
    'controller_auto_search' => false,

    // +----------------------------------------------------------------------
    // | URL设置
    // +----------------------------------------------------------------------

    // PATHINFO变量名 用于兼容模式
    'var_pathinfo'           => 's',
    // 兼容PATH_INFO获取
    'pathinfo_fetch'         => ['ORIG_PATH_INFO', 'REDIRECT_PATH_INFO', 'REDIRECT_URL'],
    // pathinfo分隔符
    'pathinfo_depr'          => '/',
    // URL伪静态后缀
    'url_html_suffix'        => 'html',
    // URL普通方式参数 用于自动生成
    'url_common_param'       => false,
    // URL参数方式 0 按名称成对解析 1 按顺序解析
    'url_param_type'         => 0,
    // 是否开启路由
    'url_route_on'           => true,
    // 路由使用完整匹配
    'route_complete_match'   => false,
    // 路由配置文件（支持配置多个）
    'route_config_file'      => ['route'],
    // 是否强制使用路由
    'url_route_must'         => false,
    // 域名部署
    'url_domain_deploy'      => false,
    // 域名根，如thinkphp.cn
    'url_domain_root'        => '',
    // 是否自动转换URL中的控制器和操作名
    'url_convert'            => true,
    // 默认的访问控制器层
    'url_controller_layer'   => 'controller',
    // 表单请求类型伪装变量
    'var_method'             => '_method',
    // 表单ajax伪装变量
    'var_ajax'               => '_ajax',
    // 表单pjax伪装变量
    'var_pjax'               => '_pjax',
    // 是否开启请求缓存 true自动缓存 支持设置请求缓存规则
    'request_cache'          => false,
    // 请求缓存有效期
    'request_cache_expire'   => null,

    // +----------------------------------------------------------------------
    // | 模板设置
    // +----------------------------------------------------------------------

    'template'               => [
        // 模板引擎类型 支持 php think 支持扩展
        'type'         => 'Think',
        // 模板路径
        'view_path'    => '',
        // 模板后缀
        'view_suffix'  => 'html',
        // 模板文件名分隔符
        'view_depr'    => DS,
        // 模板引擎普通标签开始标记
        'tpl_begin'    => '{',
        // 模板引擎普通标签结束标记
        'tpl_end'      => '}',
        // 标签库标签开始标记
        'taglib_begin' => '{',
        // 标签库标签结束标记
        'taglib_end'   => '}',
    ],

    // 视图输出字符串内容替换
    'view_replace_str'       => [
        
    ],
    // 默认跳转页面对应的模板文件
    'dispatch_success_tmpl'  => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',
    'dispatch_error_tmpl'    => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',

    // +----------------------------------------------------------------------
    // | 异常及错误设置
    // +----------------------------------------------------------------------

    // 异常页面的模板文件
    'exception_tmpl'         => THINK_PATH . 'tpl' . DS . 'think_exception.tpl',

    // 错误显示信息,非调试模式有效
    'error_message'          => '页面错误！请稍后再试～',
    // 显示错误信息
    'show_error_msg'         => false,
    // 异常处理handle类 留空使用 \think\exception\Handle
    'exception_handle'       => '',

    // +----------------------------------------------------------------------
    // | 日志设置
    // +----------------------------------------------------------------------

    'log'                    => [
        // 日志记录方式，内置 file socket 支持扩展
        'type'  => 'File',
        // 日志保存目录
        'path'  => LOG_PATH,
        // 日志记录级别
        'level' => [],
    ],

    // +----------------------------------------------------------------------
    // | Trace设置 开启 app_trace 后 有效
    // +----------------------------------------------------------------------
    'trace'                  => [
        // 内置Html Console 支持扩展
        'type' => 'Html',
    ],

    // +----------------------------------------------------------------------
    // | 缓存设置
    // +----------------------------------------------------------------------

    'cache'                  => [
        // 驱动方式
        'type'   => 'File',
        // 缓存保存目录
        'path'   => CACHE_PATH,
        // 缓存前缀
        'prefix' => '',
        // 缓存有效期 0表示永久缓存
        'expire' => 0,
    ],

    // +----------------------------------------------------------------------
    // | 会话设置
    // +----------------------------------------------------------------------

    'session'                => [
        'id'             => '',
        // SESSION_ID的提交变量,解决flash上传跨域
        'var_session_id' => '',
        // SESSION 前缀
        'prefix'         => 'think',
        // 驱动方式 支持redis memcache memcached
        'type'           => '',
        // 是否自动开启 SESSION
        'auto_start'     => true,
    ],

    // +----------------------------------------------------------------------
    // | Cookie设置
    // +----------------------------------------------------------------------
    'cookie'                 => [
        // cookie 名称前缀
        'prefix'    => '',
        // cookie 保存时间
        'expire'    => 0,
        // cookie 保存路径
        'path'      => '/',
        // cookie 有效域名
        'domain'    => '',
        //  cookie 启用安全传输
        'secure'    => false,
        // httponly设置
        'httponly'  => '',
        // 是否使用 setcookie
        'setcookie' => true,
    ],
    //验证码
    'captcha'  => [
        // 验证码字符集合
        'codeSet'  => '0123456789', 
        // 验证码字体大小(px)
        'fontSize' => 25, 
        // 是否画混淆曲线
       'useCurve' => true, 
        // 验证码图片高度
       'imageH'   => 50,
        // 验证码图片宽度
        'imageW'   => 200, 
        // 验证码位数
        'length'   => 5, 
       // 验证成功后是否重置        
        'reset'    => true
    ],

    //分页配置
    'paginate'               => [
        'type'      => 'bootstrap',
        'var_page'  => 'page',
        'list_rows' => 20,
    ],
    'album'   =>[
        0   => ['name'=>'Good-bye My Loneliness','url'=>'__STATIC__/image/a.jpg','time'=>'1991-03-27'],
        1   => ['name'=>'もう探さない','url'=>'__STATIC__/image/b.jpg','time'=>'1991-12-25'],
        2   => ['name'=>'HOLD ME','url'=>'__STATIC__/image/c.jpg','time'=>'1992-09-02'],
        3   => ['name'=>'揺れる想い','url'=>'__STATIC__/image/d.jpg','time'=>'1993-07-10'],
        4   => ['name'=>'OH MY LOVE','url'=>'__STATIC__/image/e.jpg','time'=>'1994-06-04'],
        5   => ['name'=>'forever you','url'=>'__STATIC__/image/f.jpg','time'=>'1995-03-01'],
        6   => ['name'=>'TODAY IS ANOTHER DAY','url'=>'__STATIC__/image/g.jpg','time'=>'1996-07-08'],
        7   => ['name'=>'ZARD BLEND ~SUN & STONE~','url'=>'__STATIC__/image/h.jpg','time'=>'1997-04-23'],
        8   => ['name'=>'永远','url'=>'__STATIC__/image/i.jpg','time'=>'1999-02-17'],
        9   => ['name'=>'ZARD BEST The Single Collection~轨迹~','url'=>'__STATIC__/image/j.jpg','time'=>'1999-05-28'],
        10  => ['name'=>'ZARD BEST ~Request Memorial~','url'=>'__STATIC__/image/k.jpg','time'=>'1999-09-15'],
        11  => ['name'=>'ZARD - Cruising & Live on the Pacific Venus','url'=>'__STATIC__/image/l.jpg','time'=>'2000-01-26'],
        12  => ['name'=>'时间の翼','url'=>'__STATIC__/image/m.jpg','time'=>'2001-02-15'],
        13  => ['name'=>'ZARD BLEND II ~LEAF&SNOW~','url'=>'__STATIC__/image/n.jpg','time'=>'2001-11-21'],
        14  => ['name'=>'止まっていた时计が今动き出した','url'=>'__STATIC__/image/o.jpg','time'=>'2004-01-28'],
        15  => ['name'=>'君とのDistance','url'=>'__STATIC__/image/p.jpg','time'=>'2005-09-07'],
        16  => ['name'=>'Golden Best ~15th Anniversary~','url'=>'__STATIC__/image/q.jpg','time'=>'2006-10-25'],
        17  => ['name'=>'纪念ZARD-VC特辑','url'=>'__STATIC__/image/r.jpg','time'=>'2007-05-23'],
    ],
    'sigle'    =>[
        0   => ['name'=>'Good-bye My Loneliness','time'=>'1991-02-10'],
        1   => ['name'=>'不思议ね…','time'=>'1991-06-25'],
        2   => ['name'=>'もう探さない','time'=>'1991-11-06'],
        3   => ['name'=>'眠れない夜を抱いて','time'=>'1992-08-05'],
        4   => ['name'=>'IN MY ARMS TONIGHT','time'=>'1992-09-09'],
        5   => ['name'=>'负けないで','time'=>'1993-01-27'],
        6   => ['name'=>'君がいない','time'=>'1993-04-21'],
        7   => ['name'=>'揺れる想い','time'=>'1993-05-19'],
        8   => ['name'=>'もう少し あと少し…','time'=>'1993-09-04'],
        9   => ['name'=>'きっと忘れない','time'=>'1993-11-03'],
        10   => ['name'=>'この爱に泳ぎ疲れても/Boy','time'=>'1994-02-02'],
        11   => ['name'=>'こんなにそばに居るのに','time'=>'1994-08-06'],
        12   => ['name'=>'あなたを感じていたい','time'=>'1994-12-24'],
        13   => ['name'=>'Just believe in love','time'=>'1995-02-01'],
        14   => ['name'=>'爱が见えない','time'=>'1995-06-05'],
        15   => ['name'=>'サヨナラは今もこの胸に居ます','time'=>'1995-08-28'],
        16   => ['name'=>'マイ フレンド','time'=>'1996-01-08'],
        17   => ['name'=>'心を开いて','time'=>'1996-05-06'],
        18   => ['name'=>"Don't you see!",'time'=>'1997-01-06'],
        19   => ['name'=>'君に逢いたくなったら…','time'=>'1997-02-26'],
        20   => ['name'=>'风が通り抜ける街へ','time'=>'1997-07-02'],
        21   => ['name'=>'永远','time'=>'1997-08-20'],
        22   => ['name'=>'My Baby Grand~ぬくもりが欲しくて~','time'=>'1997-12-03'],
        23   => ['name'=>'息もできない','time'=>'1998-03-04'],
        24   => ['name'=>'运命のルーレット廻して','time'=>'1998-09-17'],
        25   => ['name'=>'新しいドア~冬のひまわり~','time'=>'1998-12-02'],
        26   => ['name'=>'GOOD DAY','time'=>'1998-12-02'],
        27   => ['name'=>'MIND GAMES','time'=>'1999-04-07'],
        28   => ['name'=>'世界はきっと未来の中','time'=>'1999-06-16'],
        29   => ['name'=>'痛いくらい君があふれているよ','time'=>'1999-10-14'],
        30   => ['name'=>'この涙 星になれ','time'=>'1999-12-01'],
        31   => ['name'=>"Get U're Dream",'time'=>'2000-09-06'],
        32   => ['name'=>'promised you','time'=>'2000-11-15'],
        33   => ['name'=>'さわやかな君の気持ち','time'=>'2002-05-22'],
        34   => ['name'=>'明日を梦见て','time'=>'2003-04-09'],
        35   => ['name'=>'瞳闭じて','time'=>'2003-07-09'],
        36   => ['name'=>'もっと近くで君の横颜见ていたい','time'=>'2003-11-12'],
        37   => ['name'=>'かけがえのないもの','time'=>'2004-06-23'],
        38   => ['name'=>'今日はゆっくり话そう','time'=>'2004-11-24'],
        39   => ['name'=>'星のかがやきよ/夏を待つセイル(帆)のように','time'=>'2005-04-20'],
        40   => ['name'=>'悲しいほど贵方が好き/カラッといこう!','time'=>'2006-03-08'],
        41   => ['name'=>'ハートに火をつけて','time'=>'2006-05-10'],
        42   => ['name'=>'グロリアス マインド','time'=>'2007-12-12'],
        43   => ['name'=>'翼を広げて/爱は暗闇の中で','time'=>'2008-04-09'],
        44   => ['name'=>'素直に言えなくて','time'=>'2009-05-27'],
    ],
    'rank'  =>[
        0   => '黄铜',
        1   => '白银',
        2   => '黄金',
        3   => '铂金',
        4   => '钻石',
        5   => '王者',
    ],
    'picture_first'  =>[
        0  => '时间写真',
        1  => '泉水相关',
        2  => '其他精美图片',
    ],
    'picture_second'  =>[
        0  => [
            0 => '1991',
            1 => '1992',
            2 => '1993',
            3 => '1994',
            4 => '1995',
            5 => '1996',
            6 => '1997',
            7 => '1998',
            8 => '1999',
            9 => '2000',
            10 => '2001',
            11 => '2002',
            12 => '2003',
            13 => '2004',
            14 => '2005',
            15 => '2006',
            16 => '2007',
            17 => 'before',
        ],
        1 => [
            0 => '到过的地方及使用过的物品',
            1 => 'cd及书封面',
            2 => '日历及身份证',
            3 => '相关人士的回忆',
            4 => '网友绘画',
            5 => '动态图片',
        ],
        2 => [
            0 => '其他一',
            1 => '其他二',
            2 => '其他三',
            3 => '其他四',
        ],
    ],
];
