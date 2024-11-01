<section class='<?php echo $module_classes; ?> equal-column-heights' id="<?php echo $this->module_id(false); ?>" data-carousel-props='<?php echo json_encode($this->container['carousel_module_fields']->get_carousel_js_params($props)); ?>'>
	<?php echo $content ?>
</section>