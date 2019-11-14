mui.init({
			swipeBack:true //启用右滑关闭功能
		});
			var menuWrapper = document.getElementById("menu-wrapper");
			var menu = document.getElementById("menu");
			var menuWrapperClassList = menuWrapper.classList;
			var backdrop = document.getElementById("menu-backdrop");
			var info = document.getElementById("info");
			
			backdrop.addEventListener('tap', toggleMenu);
			document.getElementById("closer").addEventListener('tap', toggleMenu);
			document.getElementById("icon-menu").addEventListener('tap',toggleMenu)
			//下沉菜单中的点击事件 
			mui('#menu').on('tap', 'a', function() {
				toggleMenu();
				info.innerHTML = '你已选择：'+this.innerHTML;
			});
			var busying = false;

			function toggleMenu() {
				if (busying) {
					return;
				}
				busying = true;
				if (menuWrapperClassList.contains('mui-active')) {
					document.body.classList.remove('menu-open');
					menuWrapper.className = 'menu-wrapper fade-out-up animated';
					setTimeout(function() {
						backdrop.style.opacity = 0;
						menuWrapper.classList.add('hidden');
					});
				} else {
					document.body.classList.add('menu-open');
					menuWrapper.className = 'menu-wrapper fade-in-down animated mui-active';
					backdrop.style.opacity = 1;
				}
				setTimeout(function() {
					busying = false; 
				}, 500);
			}
//菜单切换
function changeTab(ltab_num) {
	for(i = 0; i <= 4; i++) {
		document.getElementById("tabc_" + i).className= ""; 
		document.getElementById("ltab_" + i).style.display = "none";
	}
	document.getElementById("tabc_" + ltab_num).className = "font_cur"; 
	document.getElementById("ltab_" + ltab_num).style.display = "block"; //显示当前层
}










