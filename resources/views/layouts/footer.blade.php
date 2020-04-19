@if($activePage!='login' && $activePage!='register')
<footer class="footer">
  <div class=" container-fluid ">
    <nav>
      <ul>
        <li>
          <a href="https://www.ug.ulearn.ng" target="_blank">
            {{__(" iBagwai")}}
          </a>
        </li>
        <li>
          <a href="http://presentation.ug.ulearn.com" target="_blank">
            {{__(" About Us")}}
          </a>
        </li>
        
        <li>
          <a href="{{url('/support')}}" target="_blank">
            {{__(" Support")}}</a>
        </li>
      </ul>
    </nav>
    <div class="copyright" id="copyright">
      &copy;
      <script>
        document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
      </script>, {{__(" Designed by")}}
      <a href="https://www.invisionapp.com" target="_blank">{{__(" Invision")}}</a>{{__(" . Coded by")}}
      <a href="https://www.ug.ulearn.com" target="_blank">{{__(" Creative Tim ")}}</a>&
      <a href="https://www.updivision.com" target="_blank">{{__(" Updivision")}}</a>
    </div>
  </div>
</footer>
@endif