<?php
/**
 * tpshop
 * ============================================================================
 * * 版权所有 2015-2027 深圳搜豹网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.tp-shop.cn
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: IT宇宙人 2015-08-10 $
 */ 
namespace Index\Controller;
use Index\Logic\ArticleLogic;
use Think\Controller;
use Think\Page;
use Think\Verify;
class ArticleController extends Controller {

    /*
     * 初始化操作
     */
    public function _initialize() {
        $this->public_assign();
    }    
    
 
    public function index(){       
        $article_id = I('article_id',38);
    	$article = D('article')->where("article_id=$article_id")->find();
    	$this->assign('article',$article);
        $this->display();
    }
    
    
    public function public_assign()
    {
        
       $tpshop_config = array();
       $tp_config = M('config')->cache(true,TPSHOP_CACHE_TIME)->select();       
       foreach($tp_config as $k => $v)
       {
       	  if($v['name'] == 'hot_keywords'){
       	  	 $tpshop_config['hot_keywords'] = explode('|', $v['value']);
       	  }       	  
          $tpshop_config[$v['inc_type'].'_'.$v['name']] = $v['value'];
       }                                         
       $this->assign('tpshop_config', $tpshop_config);          
    }      
 
    /**
     * 文章内列表页
     */
    public function articleList(){
 
        $article_cat_list = M('ArticleCat')->where("parent_id = 29")->select();
        $cat_id = I('cat_id', '29');
        $grandson_ids = getArticleCatGrandson($cat_id); 
        $where .= " is_open = 1 and cat_id in(".  implode(',', $grandson_ids).") "; // 初始化搜索条件                 
        $where .= " and ".time()." >  publish_time ";
        
        $count =  M('article')->where($where)->count();
        $Page  = new Page($count,30);
        $show  = $Page->show();        
        $article_list =  M('article')->where($where)->order('article_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('show',$show);
        $this->assign('article_list',$article_list);
        $this->assign('article_cat_list',$article_cat_list);
        
        if($cat_id == 35)
            $this->display('articleList_xq');    
        else
            $this->display();
    }    
    /**
     * 文章内容页
     */
    public function detail(){
        $article_id = I('article_id',0);    
        $article_cat_list = M('ArticleCat')->where("parent_id = 29")->select();    	    
    	$article = D('article')->where(" is_open = 1 and article_id=$article_id")->find();                
        // 如果是相亲页面
        if($article['cat_id'] == 35)
        {            
            // $this->detail_xq();            
            // echo $src = '/index.php/?m=Index&c=Article&a=detail_xq&article_id='.$article_id;            
            $this->detail_xq();
            exit;
        }        
        $this->assign('article_cat_list',$article_cat_list);
    	$this->assign('article',$article);        
        $this->display();
    } 
    
    /**
     * 更新浏览数 由于前台开启了缓存 只能ajax 请求
     */
    public function updateClick()
    {
        $article_id = I('article_id');
        if($article_id)
        {
            //$click = mt_rand(1,100);
            $click = 1;
            M('article')->where("article_id=$article_id")->setInc('click',$click); // 文章阅读数加1
            $click = M('article')->where("article_id=$article_id")->getField('click'); // 文章阅读数加1
            exit($click);
        }        
    }
    
    /**
     * 文章内容页相亲
     */
    public function detail_xq(){        
        
        $article_cat_list = M('ArticleCat')->where("parent_id = 29")->select();        
    	$article_id = I('article_id',0);        
    	$article = D('article')->where(" is_open = 1 and article_id=$article_id")->find();
        //($article[publish_time] > strtotime('+1 day')) && exit('error');// 大于明天的信息不发布出来        
        //M('article')->where("article_id=$article_id")->save(array('click'=>$article['click']+1 ));
        $this->assign('article_cat_list',$article_cat_list);    	
        
        //$tommer_article_id = D('article')->where(" cat_id = 35 and  publish_time > ".time()." and publish_time < ".(time()+60*60*24))->getField('article_id'); 
        $tommer_article_id = D('article')->where(" cat_id = 35 and  article_id > $article_id and is_open = 1 and publish_time > ".time())->order("article_id asc")->getField('article_id'); 
        $this->assign('tommer_article_id',$tommer_article_id);        
        $this->assign('article',$article);
          
        $article['content'] = htmlspecialchars_decode($article['content']);
        // 如果是明天以后的 则是预览 会将图片替换模糊
        if(date('Ymd',$article[publish_time]) >= date('Ymd',strtotime('+1 day')))
        {                   
            // 获取所有的img标签
            /*
            if(preg_match_all('/<img(.*)+>/Ui', $article['content'] ,$match)) 
            { 
                foreach($match[0] as $key => $val)
                {                                        
                    //preg_match('/src="(.*?(jpg|jpeg|gif|png))/i', $val ,$match2); // 拿出第一个img标签的 图片路径 
                    //$match2[1] = substr($match2[1],1); // 获得相对路径
                    //$tmp_thum_images = article_thum_images($match2[1], $article_id.'_'.$key, 40,40); // 拿去生成缩略图
                    if($key == 0)
                        $article['content'] = str_replace($val, "<img src='{$article['thumb']}'/>", $article['content']);    
                    else    
                        $article['content'] = str_replace($val, "", $article['content']);    
                }                                                      
             }*/            
            $this->display('detail_xq_mt');    
            exit();
        }
        // 如果是今天 10点以前
        elseif((date('Ymd',$article[publish_time]) == date('Ymd')) && (date('H') < 10))
        {           
            // 获取所有的img标签
            /*
            if(preg_match_all('/<img(.*)+>/Ui', $article['content'] ,$match)) 
            { 
                foreach($match[0] as $key => $val)
                {                                        
                    //preg_match('/src="(.*?(jpg|jpeg|gif|png))/i', $val ,$match2); // 拿出第一个img标签的 图片路径 
                    //$match2[1] = substr($match2[1],1); // 获得相对路径
                    //$tmp_thum_images = article_thum_images($match2[1], $article_id.'_'.$key, 40,40); // 拿去生成缩略图
                    if($key == 0)
                        $article['content'] = str_replace($val, "<img src='{$article['thumb']}'/>", $article['content']);    
                    else    
                        $article['content'] = str_replace($val, "", $article['content']);    
                }                                                      
             }*/
            
             $article['title'] = '预告'.$article['title'];
             $article['content'] = $article['description'];
        }                
        $this->assign('article',$article);
        $this->display('detail_xq');    
        
    } 

    /**
     * 发布文章内容
     */
    public function publish(){  
        $this->initEditor(); // 编辑器
        C('TOKEN_ON',true);
        if(IS_POST)
        {         
            $verify = new Verify();
            if (!$verify->check(I('post.verify_code'), 'publish')) 
            {
                $this->error("验证码错误");
            }   
            $map['title'] = I('title');
            $map['cat_id'] = I('cat_id');
            $map['content'] = I('content');
            $map['author'] = I('author');
            $map['add_time'] = time();
            $map['publish_time'] = time(); 
            $map['is_open'] = '0';
            
            
            if(empty($map['title']) || empty($map['content'])|| empty($map['author']))
                $this->error('标题和内容和网名不得为空');            
            
            $id = M('Article')->add($map);                        
            
            if($_FILES[file_url][tmp_name])
            {
                    $upload = new \Think\Upload();// 实例化上传类
                    $upload->maxSize   =    $map['author'] == '管理员' ? (1024*1024*10) : (1024*1024*3);// 设置附件上传大小 管理员10M  否则 3M
                    $upload->exts      =     array('zip', 'rar');// 设置附件上传类型
                    $upload->rootPath  =     './Public/upload/article/'; // 设置附件上传根目录
                    $upload->replace  =     true; // 存在同名文件是否是覆盖，默认为false
                    $upload->saveName  =   'file_'.$id; // 存在同名文件是否是覆盖，默认为false
                    // 上传文件 
                    $info   =   $upload->upload();                                        
                    if(!$info) {// 上传错误提示错误信息
                        $this->error($upload->getError());
                    }else{
                        M('Article')->where("article_id = $id")->save(array("file_url"=>'/Public/upload/article/'.$info['file_url']['savepath'].$info['file_url']['savename']));
                    } 
            }
            $this->success('已提交,待管理员审核',U('index/Article/articleList'));
            exit;
        }
        
        $article_cat_list = M('ArticleCat')->where("parent_id = 29 and cat_id != 35")->select();        
        $this->assign('article_cat_list',$article_cat_list);
        $this->display();
    }   
    
    /**
     * 发布相亲内容
     */
    public function publish_xq(){  
        $this->initEditor(); // 编辑器
        C('TOKEN_ON',true);
        if(IS_POST)
        {         
            $verify = new Verify();
            if (!$verify->check(I('post.verify_code'), 'publish')) 
            {
                $this->error("验证码错误");
            }   
            $map['title'] = '第N位嘉宾相亲信息';
            $map['cat_id'] = I('cat_id');
            $map['content'] = I('content');            
            $map['add_time'] = time();            
            $map['is_open'] = '0';
            $map['author'] = '相亲';
            $map['keywords'] = I('keywords'); // 联系方式                        
            $publish_time = M('Article')->max('publish_time');
            $map['publish_time'] = $publish_time + (60*60*24); // 找到最好一条 再往后推延一天                        
            if(empty($map['keywords']) || empty($map['content']))
                $this->error('相亲介绍和联系方式不得为空');            
            
            $id = M('Article')->add($map);             
            M('Article')->where("article_id = $id")->save(array("file_url"=>'/Public/upload/article/'.$info['file_url']['savepath'].$info['file_url']['savename']));
            $this->success('已提交,待管理员审核',U('index/Article/articleList',array('cat_id'=>35)));
            exit;
        }
        
        $article_cat_list = M('ArticleCat')->where("parent_id = 29")->select();        
        $this->assign('article_cat_list',$article_cat_list);
        $this->display();
    }       
    
    /**
     * 初始化编辑器链接     
     * 本编辑器参考 地址 http://fex.baidu.com/ueditor/
     */
    private function initEditor()
    {
        $this->assign("URL_upload", U('Admin/Ueditor/imageUp',array('savepath'=>'article'))); // 图片上传目录
        $this->assign("URL_imageUp", U('Admin/Ueditor/imageUp',array('savepath'=>'article'))); //  不知道啥图片
        $this->assign("URL_fileUp", U('Admin/Ueditor/fileUp',array('savepath'=>'article'))); // 文件上传s
        $this->assign("URL_scrawlUp", U('Admin/Ueditor/scrawlUp',array('savepath'=>'article')));  //  图片流
        $this->assign("URL_getRemoteImage", U('Admin/Ueditor/getRemoteImage',array('savepath'=>'article'))); // 远程图片管理
        $this->assign("URL_imageManager", U('Admin/Ueditor/imageManager',array('savepath'=>'article'))); // 图片管理        
        $this->assign("URL_getMovie", U('Admin/Ueditor/getMovie',array('savepath'=>'article'))); // 视频上传
        $this->assign("URL_Home", "");
    }      
   
}