<?php 
$url = $this->params['url'];
unset($url['url']);
    if(isset($this->request->data) && !empty($this->request->data)) {
        foreach($this->request->data[$model_name] as $key=>$value)
            $url[$key] = $value;
    }
    $get_var = http_build_query($url);

    $arg1 = array();
    $arg2 = array();
    //take the named url
    if(!empty($this->params['named']))
        $arg1 = $this->params['named'];

    //take the pass arguments
    if(!empty($this->params['pass']))
        $arg2 = $this->params['pass'];

    //merge named and pass
    $args = array_merge($arg1,$arg2);

    //add get variables
    $args["?"] = $get_var;
    $this->Paginator->options(array('url' =>  $args));

?>
<ul class="pagination">
            <?php
                echo $this->Paginator->prev('<span class="glyphicon glyphicon-triangle-left"></span>', array('tag' => 'li', 'escape' => FALSE), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a', 'escape' => FALSE));
                echo $this->Paginator->numbers(array( 'separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next('<span class="glyphicon glyphicon-triangle-right"></span>', array('tag' => 'li', 'escape' => FALSE), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a', 'escape' => FALSE));
            ?>
</ul>

