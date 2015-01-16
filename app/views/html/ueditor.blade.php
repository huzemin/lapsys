@section('jsload') 
  <script type="text/javascript" src="{{ asset('js/ueditor/ueditor.config.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/ueditor/ueditor.all.min.js') }}"></script>
  <script type="text/javascript">
    $(function(){
      if(typeof UE != 'undefined') {
        var ue = UE.getEditor('container');
      }
    });
  </script>
@stop