<? include 'includes/functions.php';
echo htmlHeader();?>
 </head>
    <body>
        <div class="title">
        </div>
        <? echo containerHtmlTop()?>
        <span class="ELEMENTOS">
            <span id="HOME" syle="float:left;">
                    <div class="caja" onclick="moveTopTo('MODELOS');">
                        <div class="cajaModelos cajaType"><label>MODELOS<label></div>
                        <div class="sombra"></div>
                    </div>
                    <div class="caja">
                        <div class="cajaComerciales cajaType"><label>COMERCIALES<label></div>
                        <div class="sombra"></div>
                    </div>
                    <div class="caja">
                        <div class="cajaPV cajaType"><label>POST VENTA<label></div>
                        <div class="sombra"></div>
                    </div>
                    <div class="caja">
                        <div class="cajaEventos cajaType"><label>EVENTOS<label></div>
                        <div class="sombra"></div>
                    </div>

                    <div class="titulo_home"></div>
                    <div class="clear">&nbsp;</div>
            </span>
            <div id="MODELOS" class="elemento">
                    <div class="list_carousel">
                        <ul id="foo2">
                            <?
                            for($i=1;$i<15+1;$i++){
                                echo '<li style="width: 50px; height: 50px;"><img src="media/img/'.$i.'.jpg" onclick="goHorizontalTo(\'.modelosRotator\',\'modelo_auto_'.$i.'\')" width="50" height="50"></li>';
                            }
                            ?>
                        </ul>
                        <div class="clearfix"></div>
                        <a id="prev2" class="prev" href="#">&lt;</a>
                        <a id="next2" class="next" href="#">&gt;</a>
                        <div id="pager2" class="pager"></div>
                    </div>
            </div>
        </span>
        <? echo containerHtmlBottom()?>
    </body>
</html>
