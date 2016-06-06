<?php
$tooltip_class = 'has-tip';
$tooltip_title_prev = 'Previous:';
$tooltip_title_next = 'Next:';
$html .= '<div class="navbox">';






if ($field->prev)
{
	$tooltip = $use_tooltip ? ' title="'. flexicontent_html::getToolTip(/*$tooltip_title_prev, */$field->prevtitle, 0) .'"' : '';
	$html .= '
	
		<a data-tooltip aria-haspopup="true" class="nav-prev' . ($use_tooltip ? ' has-tip ' : '') . '" ' . ($use_tooltip ? $tooltip : '') . ' href="'. $field->prevurl .'">
			<i class="icon icon-chevron-left"></i>
			<span class="visuallyhidden">' . ( $use_title ? $field->prevtitle : htmlspecialchars(/*$prev_label, */ENT_NOQUOTES, 'UTF-8') ).'</span>
			
		</a>';
} else {
	$html .= '<i class="icon icon-chevron-left disabled"></i>';
}
		
// Item location and total count
//$html .= $show_prevnext_count ? '<span class="fcpagenav-items-cnt btn disabled">'.($location+1).' / '.$item_count.'</span>' : '';


if ($use_category_link && $page_link == "")
{
	$cat_image = $this->getCatThumb($category, $field->parameters);
	if (!empty($rows[$item->id]->categoryslug)) {
		$tooltip = $use_tooltip ? ' title="'. flexicontent_html::getToolTip($category_label, $category->title, 0) .'"' : '';
		$html .= '
			<a data-tooltip aria-haspopup="true" class="pagenav-return' . ($use_tooltip ? ' has-tip tip-bottom' : '') . '" ' . ($use_tooltip ? $tooltip : '') . ' href="'. JRoute::_(FlexicontentHelperRoute::getCategoryRoute($rows[$item->id]->categoryslug)).'?start='.$start .'">
				<i class="icon icon-grid-alt"></i>
				<span class="visuallyhidden">' . htmlspecialchars($category->title, ENT_NOQUOTES, 'UTF-8') .'</span>
				</a>';
	}
	
}

if ($page_link != "") {
	
	$tooltip = $use_tooltip ? ' title="'. flexicontent_html::getToolTip(/*$tooltip_title_prev, */$page_label, 0) .'"' : '';
	$html .= '<a data-tooltip aria-haspopup="true" class="pagenav-return' . ($use_tooltip ? ' has-tip tip-bottom' : '') . '" ' . ($use_tooltip ? $tooltip : '') . ' href="'.$page_link.'">
				<i class="icon icon-grid-alt"></i>
				<span class="visuallyhidden">' . htmlspecialchars($page_label, ENT_NOQUOTES, 'UTF-8') .'</span>
				</a>';
			
}

if ($field->next)
{
	$tooltip = $use_tooltip ? ' title="'. flexicontent_html::getToolTip(/*$tooltip_title_next, */$field->nexttitle, 0) .'"' : '';
	$html .= '
		<a data-tooltip aria-haspopup="true" class="nav-next' . ($use_tooltip ? ' has-tip tip-bottom' : '')  . '" ' . ($use_tooltip ? $tooltip : '') . ' href="'. $field->nexturl .'">
			<i class="icon icon-chevron-right"></i>
			<span class="visuallyhidden">' . ( $use_title ? $field->prevtitle : htmlspecialchars($next_label, ENT_NOQUOTES, 'UTF-8') ).'</span>
		</a>';
} else {
	$html .= '<i class="icon icon-chevron-right disabled"></i>';
}
//END .NAVBOX
$html .= '</div>';
?>