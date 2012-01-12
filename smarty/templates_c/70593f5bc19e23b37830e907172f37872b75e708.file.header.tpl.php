<?php /* Smarty version Smarty-3.0.8, created on 2012-01-12 00:48:58
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/public/layout/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4504798304f0e2dfabdca24-48633821%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70593f5bc19e23b37830e907172f37872b75e708' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/public/layout/header.tpl',
      1 => 1326329305,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4504798304f0e2dfabdca24-48633821',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<script type="text/javascript">
	$(document).ready(function() {
		$('#topbar').dropdown();
		$(".tab_content").hide(); //Esconde todo el contenido
		$("ul.tabs li:first").addClass("active").show(); //Activa la primera tab
		$(".tab_content:first").show(); //Muestra el contenido de la primera tab
		
		$("ul.tabs li").click(function() {


		$("ul.tabs li").removeClass("active"); //Elimina las clases activas
	
		$(this).addClass("active"); //Agrega la clase activa a la tab seleccionada
	
		$(".tab_content").hide(); //Esconde todo el contenido de la tab
	
		var activeTab = $(this).find("a").attr("href"); //Encuentra el valor del atributo href para identificar la tab activa + el contenido
		
		if(activeTab=='#profile'){
			ruta="profile";
		}
		else if(activeTab=='#general'){
			ruta="general";
		}

		$("#loading").show();	
		$.ajax({
			      type: "POST",
			      url: '<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/tabs/'+ruta,
		      	  success:function(data){
		      	  	var result = jQuery.parseJSON(data);
					$("#loading").hide();
					$(activeTab).html(result);
					$(activeTab).fadeIn(); //Agrega efecto de transición (fade) en el contenido activo
		      	  }
			});
			
			
		
			return false;
	
		});
	});
</script>

<script type="text/javascript">
  $(function(){
	 

    // --- Initialize sample trees
    $("#tree").dynatree({
      title: "Ficheros y Carpetas",
      fx: { height: "toggle", duration: 200 },
      minExpandLevel: 1,
      autoFocus: false, // Set focus to first child, when expanding or lazy-loading.
      // In real life we would call a URL on the server like this:
//          initAjax: {
//              url: "/getTopLevelNodesAsJson",
//              data: { mode: "funnyMode" }
//              },
      // .. but here we use a local file instead:
      initAjax: {
        url: "<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
php/private/user/init/sample-data3.json"
        },
	  
      onActivate: function(node) {
        $("#echoActive").text("" + node + " (" + node.getKeyPath()+ ")");
      },

      onLazyRead: function(node){
        // In real life we would call something like this:
//              node.appendAjax({
//                  url: "/getChildrenAsJson",
//                data: {key: node.data.key,
//                       mode: "funnyMode"
//                         }
//              });
        // .. but here we use a local file instead:
        node.appendAjax({
          url: "sample-data2.json",
          // We don't want the next line in production code:
          debugLazyDelay: 750
        });
      }
    });
    $("#btnReloadActive").click(function(){
      var node = $("#tree").dynatree("getActiveNode");
      if( node && node.isLazy() ){
        node.reloadChildren(function(node, isOk){
        });
      }else{
        alert("Please activate a lazy node first.");
      }
     });
     
     $("#tree_collapse").click(function(){
      $("#tree").dynatree("getRoot").visit(function(node){
        node.expand(false);
      });
      return false;
    });
    
     $("#wrapper").click(function(){
      $("#tree").toggle();
      return false;
    });
    

    $("#btnLoadKeyPath").click(function(){
      var tree = $("#tree").dynatree("getTree");
      // Make sure that node #_27 is loaded, by traversing the parents.
      // The callback is executed for every node as we go:
      tree.loadKeyPath("/folder4/_23/_26/_27", function(node, status){
        if(status == "loaded") {
          // 'node' is a parent that was just traversed.
          // If we call expand() here, then all nodes will be expanded
          // as we go
          node.expand();
        }else if(status == "ok") {
          // 'node' is the end node of our path.
          // If we call activate() or makeVisible() here, then the
          // whole branch will be exoanded now
          node.activate();
        }
      });
     });
  });
</script>






<div class="topbar" data-dropdown="dropdown">
	<div class="topbar-inner">
		<span id="loading" class="label important right" style="display:none;margin-top: 7px;margin-right: 5px;">Loading...</span>
  		<div class="container" style="width:980px">
			<a id="brand" class="brand margin-top-1" href="<?php if ($_smarty_tpl->getVariable('LOGUEADO')->value){?><?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/files<?php }else{ ?><?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
<?php }?>"><img src="<?php echo $_smarty_tpl->getVariable('IMAGES_URL')->value;?>
/logos/logo.png" /></a>
			<?php if ($_smarty_tpl->getVariable('LOGUEADO')->value){?>
			<ul class="nav">
				<li <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='files'){?>class="active"<?php }?>>
					<a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/files" ><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_fichero<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
				</li>
				<li <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='contact'){?>class="active"<?php }?>>
						<a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
personal" <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='contact'){?>class="seleccionado"<?php }?>><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_colaboradores<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
				</li>
			
				<li class="dropdown <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='myaccount'){?> active <?php }?>">
						<a href="#" class="dropdown-toggle"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_mi_cuenta<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
						<ul class="dropdown-menu">
							<li>
								<a class="azul" href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/profile">
									<div class="bd">
					        				<table>
					        					<tr>
					        						<td>
					        						<?php if ($_smarty_tpl->getVariable('foto')->value==''){?>
					        							<img style="border: 1px solid #CCC" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/php/rescalado_imagen/image.php/<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/iconos/icon_avatar_grande.png?width=30&amp;image=<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/iconos/icon_avatar_grande.png"  alt="avatar-grande" />
					        						<?php }else{ ?>
					        							<img style="border: 1px solid #CCC" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/php/rescalado_imagen/image.php/<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
datas/users/<?php echo $_smarty_tpl->getVariable('id_usuario')->value;?>
/profile/<?php echo $_smarty_tpl->getVariable('foto')->value;?>
?width=30&amp;image=<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
datas/users/<?php echo $_smarty_tpl->getVariable('id_usuario')->value;?>
/profile/<?php echo $_smarty_tpl->getVariable('foto')->value;?>
"  alt="avatar-grande" />
					        						<?php }?>	
					        						</td>
					        						<td>
					        							<span class="azul" style="float:left;font-weight: bold;"><?php echo $_smarty_tpl->getVariable('nombre_usuario')->value;?>
</span>
					     				     			<span style="float:left;" class="azul margin-top-5" ><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_lat_izq_acceder_perfil<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span>
					        						</td>
				        					</tr>
				        				</table>
				        			</div>
								
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a class="azul" href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
logout"><span class="azul" ><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_desconectarse<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span></a>
							</li>
						</ul>
					</li>
			</ul>
			<ul class="nav secondary-nav" style="margin-right: 10px;">
           		<li class="menu" data-dropdown="menu">
           			<?php if ($_smarty_tpl->getVariable('LOGUEADO')->value){?>
						<form action="" class="pull-left">
			          	  <input type="text" placeholder="<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_search_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
			          	</form>
			          	
					<?php }?>
				</li>
			</ul>
			<?php }else{ ?>
			<ul class="nav">
				<li <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='inicio'){?>class="active"<?php }?>>
					<a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
" ><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_inicio<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
				</li>
				<li <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='como_funciona'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
personal" <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='pagina_personal'){?>class="seleccionado"<?php }?>><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_personal<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
				<li <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='como_funciona'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
empresas" <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='pagina_empresa'){?>class="seleccionado"<?php }?>><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_empresa<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
				<li <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='como_funciona'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
como_funciona" <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='como_funciona'){?>class="seleccionado"<?php }?>><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_planes_pago<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
				<li <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='crea_tu_perfil'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
planes_precios" <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='pagina_precios'){?>class="seleccionado"<?php }?>><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_precios<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
				<li <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='faqs'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
faqs" ><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_faqs<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
			</ul>
			<ul class="nav secondary-nav" style="margin-right: 10px;">
           		<li class="menu" data-dropdown="menu">
           			<button class="btn small primary margin-top-5" onclick="location.href='<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
login'"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_login<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</button>
           			<ul class="dropdown-menu">
							<li><a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/profile"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_conf_perfil<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
logout"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_desconectarse<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
					</ul>
				</li>
			</ul>
			<?php }?>
		</div>
	</div>
	<?php if ($_smarty_tpl->getVariable('LOGUEADO')->value){?>
	
	<div  class="page-header">
			<div class="wrapper-all">
		       		<a href="#" id="tree_collapse" onclick="$('#tree').toggle();" style="color:#3376A4;background: none">All Files</a>
					<div id="tree" style="color:#222; display: none;
									    left: 215px;
									    position: absolute;
									    top: 79px;
									    width: 325px;
									    z-index: 10;"><!-- When using initAjax, it may be nice to put a throbber here, that spins until the initial content is loaded: -->
				  	</div>
		          	<table class="page_table">
        					<tr>
        						<td>
        							<h1><?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='files'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_sub_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }elseif(isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='myaccount'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_sub_myaccount<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?> <small><?php if ($_smarty_tpl->getVariable('menu_principal')->value=='files'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_sub_message<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?></small></h1>			
        							  <div id="tabs_menu" style="float:left;margin-bottom:-3px;">
        							    <ul class="tabs">
									    	<li style="background-color:#fff">
									    		<a href="#profile" style="line-height:10px; color:#545454;font-weight: bold;background-color:#fff;background-image: none;"><?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='files'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_sub_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }elseif(isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='myaccount'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_tabs_profile<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?></a>
									    	</li>
									    	<?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='myaccount'){?>
									    	<li>
									    		<a href="#general" style="line-height:10px; color:#545454;font-weight: bold;background-image: none;"><?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='files'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_sub_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }elseif(isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='myaccount'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_tabs_profile_general<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?></a>
									    	</li>
									    	<?php }?>
									    </ul>
									   </div>
        						</td>
        						<td>
        						
        						</td>
        						<td style="width:22%; ">
        							<?php if ($_smarty_tpl->getVariable('foto')->value==''){?>
        							<a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/profile">
        								<img style="float:left;border: 1px solid #CCC;padding:4px;" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/php/rescalado_imagen/image.php/<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/iconos/icon_avatar_grande.png?width=40&amp;image=<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/iconos/icon_avatar_grande.png"  alt="avatar-grande" />
	        						</a>
	        						<?php }else{ ?>
	        						<a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/profile">
	        							<img style="float:left;border: 1px solid #CCC;padding:4px;" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/php/rescalado_imagen/image.php/<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
datas/users/<?php echo $_smarty_tpl->getVariable('id_usuario')->value;?>
/profile/<?php echo $_smarty_tpl->getVariable('foto')->value;?>
?width=40&amp;image=<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
datas/users/<?php echo $_smarty_tpl->getVariable('id_usuario')->value;?>
/profile/<?php echo $_smarty_tpl->getVariable('foto')->value;?>
"  alt="avatar-grande" />
	        						</a>
	        						<?php }?>	
	        						<div style="float:left;margin-top:30px;margin-left:4px;">
     				     				<a class="enlace-color" href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
logout"><span class="azul" style="background-color:#F5F5F5;padding:2px;"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_desconectarse<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span></a>
     				     				<span class="label warning">Upgrade</span>
     				     			</div>
        						</td>
        					</tr>
        				</table>
		    </div>
	</div>
	<?php }?>
</div>

