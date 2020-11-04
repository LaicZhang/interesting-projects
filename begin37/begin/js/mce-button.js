(function() {
	tinymce.PluginManager.add('begin_mce_button', function( editor, url ) {
		editor.addButton( 'begin_mce_button', {
			text: false,
			icon: 'editimage',
			title : '短代码',
			type: 'menubutton',
			menu: [
					{
					text: '内容保护',
					menu: [
						{
							text: '密码保护',
							icon: 'lock',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[password key=密码]'+selected+'[/password]');
							}
						},

						{
							text: '微信验证',
							icon: 'unlock',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[wechat key=验证码 reply=回复关键字]'+selected+'[/wechat]');
							}
						},

						{
							text: '回复可见',
							icon: 'bubble',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[reply]'+selected+'[/reply]');
							}
						},

						{
							text: '登录可见',
							icon: 'user',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[login]'+selected+'[/login]');
							}
						},
					]
				},

				{
					text: '链接按钮',
					menu: [
						{
							text: '下载按钮',
							icon: 'nonbreaking',
							onclick: function() {
								editor.insertContent('[url href=' + '下载链接地址]按钮名称[/url]');
							}
						},

						{
							text: '链接按钮',
							icon: 'newtab',
							onclick: function() {
								editor.insertContent('[link href=' + '链接地址]按钮名称[/link]');
							}
						},

						{
							text: '弹窗下载',
							icon: 'newtab',
							onclick: function() {
								editor.insertContent('[button]文件下载[/button]');
							}
						},

						{
							text: '直达按钮',
							icon: 'newtab',
							onclick: function() {
								editor.insertContent('[go]' + '');
							}
						},
					]
				},

				{
					text: '综合功能',
					menu: [
						{
							text: '添加相册',
							icon: 'image',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[img]'+selected+'[/img]');
							}
						},

						{
							text: '添加宽图',
							icon: 'image',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[full_img]'+selected+'[/full_img]');
							}
						},

						{
							text: '隐藏图片',
							icon: 'image',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[hide_img]'+selected+'[/hide_img]');
							}
						},

						{
							text: '字体图标',
							icon: 'paste',
							onclick: function() {
								editor.insertContent('[fontzm icon="图标代码" size="24" color="c40000" sup="0"]');
							}
						},

						{
							text: '中英混排',
							icon: 'spellchecker',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[en]'+selected+'[/en]');
							}
						},

						{
							text: '两栏文字',
							icon: 'tabledeletecol',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[two_column]'+selected+'[/two_column]');
							}
						},

						{
							text: '同标签文章',
							icon: 'anchor',
							onclick: function() {
								editor.insertContent('[tags_post title=小标题 n=篇数 ids=标签ID]' + '');
							}
						},

						{
							text: '文字折叠',
							icon: 'pluscircle',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[s][p]<p>'+selected+'</p>' + '<p>[/p]</p>');
							}
						},

						{
							text: '时间轴',
							icon: 'insertdatetime',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[line]'+selected+'[/line]');
							}
						},

						{
							text: 'fieldset标签',
							icon: 'template',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('<fieldset><legend>我是标题</legend>'+selected+'</fieldset>' + '');
							}
						},

						{
							text: 'iframe标签',
							icon: 'template',
							onclick: function() {
								editor.insertContent('[iframe src="网址"' + ']');
							}
						},

						{
							text: '插入广告',
							icon: 'upload',
							onclick: function() {
								editor.insertContent('[ad]' + '');
							}
						},

						{
							text: 'MP4视频',
							icon: 'media',
							onclick: function() {
								editor.insertContent('[video width="宽" height="高" mp4=' + '视频链接地址][/video]');
							}
						}
					]
				},

				{
					text: '彩色背景',
					menu: [
						{
							text: '绿色框',
							icon: 'fill',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[mark_a]'+selected+'[/mark_a]');
							}
						},

						{
							text: '红色框',
							icon: 'fill',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[mark_b]'+selected+'[/mark_b]');
							}
						},

						{
							text: '灰色框',
							icon: 'fill',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[mark_c]'+selected+'[/mark_c]');
							}
						},

						{
							text: '黄色框',
							icon: 'fill',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[mark_d]'+selected+'[/mark_d]');
							}
						},

						{
							text: '蓝色框',
							icon: 'fill',
							onclick: function() {
								selected = tinyMCE.activeEditor.selection.getContent();
								editor.insertContent('[mark_e]'+selected+'[/mark_e]');
							}
						}
					]
				}
			]
		});
	});
})();