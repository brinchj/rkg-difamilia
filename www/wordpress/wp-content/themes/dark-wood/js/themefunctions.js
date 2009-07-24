function show_rss(url)
{
  var imgDest = document.getElementById('rss');
  var imgSrc = url+'/images/rss_icon_hover.png';
  imgDest.setAttribute("src", imgSrc);
}

function hide_rss(url)
{
  var imgDest = document.getElementById('rss');
  var imgSrc = url+'/images/rss_icon.png';
  imgDest.setAttribute("src", imgSrc);
}