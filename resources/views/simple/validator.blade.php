@extends('simple.layout.common')
@section('title')
{!!$title!!}
@stop

@section('description')
{!!$description!!}
@stop

@section('keywords')
{!!$keywords!!}
@stop

@section('appname')
{!!$appname!!}
@stop


@section('content')
	
    <div class="content-box">
    
    	<div class="panel panel-danger box">
    	
        <div class="panel-heading">
        	<div class="caption">
        		<i class="fa fa-cogs"></i>
            	验证错误
        	</div><!--/caption-->
        </div><!--/title-->
        
        <div class="panel-body">
        
        	@foreach($messages->all() as $message)
         	<div class="alert alert-danger">
            	{!!$message!!}
            </div>
            @endforeach
            <div class="alert alert-info">
            	<span id="totalSecond" class="red">3</span>秒自动返回上一页
            </div>
            <div class="alert alert-info">
            	<a href="{!!$url!!}">返回上一页</a>
            </div>
        </div><!--/body-->
    	
    </div><!--/portlet-->
   
   </div>
      
    <script type="text/javascript">
$(function(){
	
	var second = $('#totalSecond').html();
		second = parseInt(second);
		
		function mytime(){
			 second = second -1 ;
			 $('#totalSecond').html(second);
			
			if(second < 0){
				 window.location.href="{!!$url!!}";
			}
       }
	   
		setInterval(mytime, 1000);
});

</script>  
@stop