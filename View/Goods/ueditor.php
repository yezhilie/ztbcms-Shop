<script type="text/javascript">
    /*
     * 在线编辑器相 关配置 js
     *  参考 地址 http://fex.baidu.com/ueditor/
     */
    window.UEDITOR_Admin_URL = "{$config_siteurl}statics/extres/shop/plugins/Ueditor/";
    var URL_upload = "{$URL_upload}";
    var URL_fileUp = "{$URL_fileUp}";
    var URL_scrawlUp = "{$URL_scrawlUp}";
    var URL_getRemoteImage = "{$URL_getRemoteImage}";
    var URL_imageManager = "{$URL_imageManager}";
    var URL_imageUp = "{$URL_imageUp}";
    var URL_getMovie = "{$URL_getMovie}";
    var URL_home = "{$URL_home}";
</script>
<script type="text/javascript" charset="utf-8"
        src="{$config_siteurl}statics/extres/shop/plugins/Ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8"
        src="{$config_siteurl}statics/extres/shop/plugins/Ueditor/ueditor.all.min.js">
</script>
<script type="text/javascript" charset="utf-8"
        src="{$config_siteurl}statics/extres/shop/plugins/Ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
    var editor;
    $(function () {
        //具体参数配置在  editor_config.js  中
        var options = {
            zIndex: 999,
            initialFrameWidth: "95%", //初化宽度
            initialFrameHeight: 400, //初化高度
            focus: false, //初始化时，是否让编辑器获得焦点true或false
            maximumWords: 99999,
            removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign', //允许的最大字符数 'fullscreen',
            pasteplain: false, //是否默认为纯文本粘贴。false为不使用纯文本粘贴，true为使用纯文本粘贴
            autoHeightEnabled: true
            /*   autotypeset: {
             mergeEmptyline: true,        //合并空行
             removeClass: true,           //去掉冗余的class
             removeEmptyline: false,      //去掉空行
             textAlign: "left",           //段落的排版方式，可以是 left,right,center,justify 去掉这个属性表示不执行排版
             imageBlockLine: 'center',    //图片的浮动方式，独占一行剧中,左右浮动，默认: center,left,right,none 去掉这个属性表示不执行排版
             pasteFilter: false,          //根据规则过滤没事粘贴进来的内容
             clearFontSize: false,        //去掉所有的内嵌字号，使用编辑器默认的字号
             clearFontFamily: false,      //去掉所有的内嵌字体，使用编辑器默认的字体
             removeEmptyNode: false,      //去掉空节点
             //可以去掉的标签
             removeTagNames: {"font": 1},
             indent: false,               // 行首缩进
             indentValue: '0em'           //行首缩进的大小
             }*/
            ,
            toolbars: [
                ['fullscreen', 'source', '|', 'undo', 'redo',
                    '|', 'bold', 'italic', 'underline', 'fontborder',
                    'strikethrough', 'superscript', 'subscript',
                    'removeformat', 'formatmatch', 'autotypeset',
                    'blockquote', 'pasteplain', '|', 'forecolor',
                    'backcolor', 'insertorderedlist',
                    'insertunorderedlist', 'selectall', 'cleardoc', '|',
                    'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                    'customstyle', 'paragraph', 'fontfamily', 'fontsize',
                    '|', 'directionalityltr', 'directionalityrtl',
                    'indent', '|', 'justifyleft', 'justifycenter',
                    'justifyright', 'justifyjustify', '|', 'touppercase',
                    'tolowercase', '|', 'link', 'unlink', 'anchor', '|',
                    'imagenone', 'imageleft', 'imageright', 'imagecenter',
                    '|', 'insertimage', 'emotion', 'insertvideo',
                    'attachment', 'map', 'gmap', 'insertframe',
                    'insertcode', 'webapp', 'pagebreak', 'template',
                    'background', '|', 'horizontal', 'date', 'time',
                    'spechars', 'wordimage', '|',
                    'inserttable', 'deletetable',
                    'insertparagraphbeforetable', 'insertrow', 'deleterow',
                    'insertcol', 'deletecol', 'mergecells', 'mergeright',
                    'mergedown', 'splittocells', 'splittorows',
                    'splittocols', '|', 'print', 'preview', 'searchreplace'
                ]
            ]
        };
        editor = new UE.ui.Editor(options);
        editor.render("goods_content"); //  指定 textarea 的  id 为 goods_content

    });
</script>