<?php
/**
 * tpshop
 * ============================================================================
 * 版权所有 2015-2027 深圳搜豹网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.tp-shop.cn
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * 评论管理控制器
 * Date: 2015-10-20
 */

namespace Admin\Controller;


use Think\AjaxPage;
use Think\Model;
use Think\Page;

class CommentController extends BaseController {


    public function index(){
        $model = M('comment');
        $count = $model->where(array('parent_id'=>0))->count();
        $Page  = new Page($count,15);
        $show = $Page->show();
        $username = I('get.username');
        $username = I('get.content');
        $where = '';
        $sql = "SELECT COUNT(1) FROM __PREFIX__comment WHERE ";
        $comment_list = $model->where(array('parent_id'=>0))->order('add_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();        
        if(!empty($comment_list))
        {
            $goods_id_arr = get_arr_column($comment_list, 'goods_id');
            $goods_list = M('Goods')->where("goods_id in (".  implode(',', $goods_id_arr).")")->getField("goods_id,goods_name");           
        }        
        
        $this->assign('goods_list',$goods_list);
        $this->assign('comment_list',$comment_list);
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }

    public function detail(){
        $id = I('get.id');
        $res = M('comment')->where(array('comment_id'=>$id))->find();
        if(!$res){
            exit($this->error('不存在该评论'));
        }
        if(IS_POST){
            $add['parent_id'] = $id;
            $add['content'] = I('post.content');
            $add['goods_id'] = $res['goods_id'];
            $add['add_time'] = time();
            $add['username'] = 'admin';

            $add['is_show'] = 1;

            $row =  M('comment')->add($add);
            if($row){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
            exit;

        }
        $reply = M('comment')->where(array('parent_id'=>$id))->select(); // 评论回复列表
         
        $this->assign('comment',$res);
        $this->assign('reply',$reply);
        $this->display();
    }


    public function del(){
        $id = I('get.id');
        $row = M('comment')->where(array('comment_id'=>$id))->delete();
        if($row){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

    public function op(){
        $type = I('post.type');
        $selected_id = I('post.selected');
        if(!in_array($type,array('del','show','hide')) || !$selected_id)
            $this->error('非法操作');
        $where = "comment_id IN ({$selected_id})";
        if($type == 'del'){
            //删除回复
            $where .= " OR parent_id IN ({$selected_id})";
            $row = M('comment')->where($where)->delete();
//            exit(M()->getLastSql());
        }
        if($type == 'show'){
            $row = M('comment')->where($where)->save(array('is_show'=>1));
        }
        if($type == 'hide'){
            $row = M('comment')->where($where)->save(array('is_show'=>0));
        }
        if(!$row)
            $this->error('操作失败');
        $this->success('操作成功');

    }

    public function ajaxindex(){
        $model = M('comment');
       // $count = $model->where(array('parent_id'=>0))->count();

        $username = I('nickname');
        $content = I('content');
        $where='';
        if($username){
            $where = " AND username='$username'";
        }
        if($content){
            $where = " AND content like '%{$content}%'";
        }
        $sql = "SELECT COUNT(1) as total_count FROM __PREFIX__comment WHERE parent_id=0".$where;
        $count = M()->query($sql);
//        exit(M()->getLastSql());

        $Page  = new AjaxPage($count[0]['total_count'],15);
        $show = $Page->show();

        $sql = "SELECT * FROM __PREFIX__comment WHERE parent_id=0".$where.' ORDER BY add_time DESC LIMIT '.$Page->firstRow.','.$Page->listRows;
//        exit($sql);
        $comment_list =  M()->query($sql);
//        $comment_list = $model->where(array('parent_id'=>0))->order('add_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        if(!empty($comment_list))
        {
            $goods_id_arr = get_arr_column($comment_list, 'goods_id');
            $goods_list = M('Goods')->where("goods_id in (".  implode(',', $goods_id_arr).")")->getField("goods_id,goods_name");
        }
        $this->assign('goods_list',$goods_list);
        $this->assign('comment_list',$comment_list);
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }
}