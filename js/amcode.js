jQuery(document).ready(function($) {
  //With it I can show a Tooltip
  $('.tooltipped').tooltip({"delay": 50, "position": 'top'});
  $('.menu-toggle').sideNav({menuWidth: 240, activationWidth: 70});
  $('.modal-trigger').leanModal();
});
