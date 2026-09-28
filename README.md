# ZF Default

Clean WordPress starter theme by **zfhassaan**, with a dynamic page-template registry for building out pages quickly.

## Activate

1. Appearance → Themes → activate **ZF Default**
2. Appearance → Menus → assign Primary / Footer locations
3. Appearance → Customize → Site Identity → upload a logo

## Add a page template

### 1. Create the PHP file

Add `page-templates/your-slug.php`:

```php
<?php
/**
 * Template Name: Your Template Label
 * Template Post Type: page
 *
 * @package ZF_Default
 */

get_header();
?>
<main id="main-content" class="zf-main zf-your-slug">
	<?php
	while ( have_posts() ) :
		the_post();
		the_content();
	endwhile;
	?>
</main>
<?php
get_footer();
```

WordPress picks up `Template Name` automatically in the Page Attributes → Template dropdown.

### 2. Register assets (optional but recommended)

Edit `inc/page-templates.php` and add an entry (or use the filter):

```php
'your-slug' => array(
	'file'       => 'page-templates/your-slug.php',
	'label'      => __( 'Your Template Label', 'zfhassaan' ),
	'body_class' => 'zf-template-your-slug',
	'styles'     => array( 'your-slug' ),  // → assets/css/templates/your-slug.css
	'scripts'    => array( 'your-slug' ),  // → assets/js/templates/your-slug.js
),
```

Or from a plugin / child theme:

```php
add_filter( 'zf_page_templates', function ( $templates ) {
	$templates['pricing'] = array(
		'file'       => 'page-templates/pricing.php',
		'label'      => 'Pricing',
		'body_class' => 'zf-template-pricing',
		'styles'     => array( 'pricing' ),
		'scripts'    => array(),
	);
	return $templates;
} );
```

### 3. Add CSS / JS files

- `assets/css/templates/your-slug.css`
- `assets/js/templates/your-slug.js` (only if listed in `scripts`)

Missing files are skipped safely.

## Bundled templates

| Template       | File                          | Use                        |
|----------------|-------------------------------|----------------------------|
| Full Width     | `page-templates/full-width.php` | Content without sidebar  |
| Blank Canvas   | `page-templates/blank.php`      | No header/footer chrome  |
| Landing Page   | `page-templates/landing.php`    | Hero + content marketing |
| Contact        | `page-templates/contact.php`    | Two-column contact layout|

## Helpers

- `zf_get_page_templates()` — full registry
- `zf_get_active_page_template()` — active config or `null`
- `zf_is_page_template( 'landing' )` — slug check
- `zf_asset( 'css/main.css' )` — theme asset URI

## Structure

```
zf-default/
├── assets/css/main.css
├── assets/css/templates/
├── assets/js/main.js
├── assets/js/templates/
├── inc/setup.php
├── inc/enqueue.php
├── inc/helpers.php
├── inc/page-templates.php
├── page-templates/
├── template-parts/
├── functions.php
└── style.css
```
