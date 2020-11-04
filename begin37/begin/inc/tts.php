<?php 
// TTS
function mbStrSplit ($string, $len = 1) { 
	$start = 0;
	$strlen = mb_strlen($string);
	while ($strlen) {
		$array[] = mb_substr($string,$start,$len,"utf8");
		$string = mb_substr($string, $len, $strlen,"utf8");
		$strlen = mb_strlen($string);
	}
	return $array;
}

function match_chinese($chars,$encoding = 'utf8') {
	$pattern = ($encoding == 'utf8')?'/[\x{4e00}-\x{9fa5}a-zA-Z0-9,，。 ]/u':'/[\x80-\xFF]/';
	preg_match_all($pattern,$chars,$result);
	$temp = join('',$result[0]);
	return $temp;
}

$str=$post->post_content;
$str = strip_tags($str);
$str = str_replace("、","，",$str);
$str = match_chinese($str);
$wordscount = mb_strlen(preg_replace('/\s/','',html_entity_decode(strip_tags($str))),'UTF-8');
$word = mbStrSplit($str, 900);
$tts = "https://tts.baidu.com/text2audio?cuid=baiduid&lan=zh&ctp=1&pdt=311&spd=5&tex=";
?>
<?php if ($wordscount <= 1800): ?>
<script type="text/javascript">
function playPause() {
	var music = document.getElementById('tts');
	if (music.paused) {
		music.play();
		var audio = document.getElementById("tts");
		audio.onended = function() {
			audio.src = "<?php echo $tts.$word[1]; ?>";
			audio.play();
			audio.addEventListener("ended", function() {
				audio.src = "<?php echo $tts.$word[2]; ?>";
				audio.load();
				audio.addEventListener("ended", function() {
					audio.pause();
				}, false);
			}, false);
		};
	} else {
		music.pause();
	}
}

$(document).ready(function(){
	$(".tts-play").click(function() {
		$("#tts").append('<source src="<?php echo $tts.$word[0]; ?>" type="video/mp4">');
		$(".tts-play").toggleClass("tts-read");
	});
});
</script>
<video id="tts" style="display:none"></video>
<?php endif; ?>