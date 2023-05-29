<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor filter Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
 class Elementor_filter_Widget extends \Elementor\Widget_Base {
	 
	 /**
	 * Get widget name.
	 *
	 * Retrieve filter widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'tabposte';
	}
	
	/**
	 * Get widget title.
	 *
	 * Retrieve filter widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'table filter', 'elementor-filter-poste' );
	}
	
	/**
	 * Get widget icon.
	 *
	 * Retrieve filter widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-table';
	}
	
	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://mail.google.com/mail/u/0/?pli=1#inbox';
	}
	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}
	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the filter widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'post', 'url', 'link' ];
	}
	
	/**
	 * Register oEmbed widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Poste table', 'elementor-filter-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'filer-name',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'name', 'elementor-filter-widget' ),
				'placeholder' => esc_html__( 'enter your name', 'elementor-filter-widget' ),
			]
		);
		
		$this->add_control(
			'filter-description',
			[
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label' => esc_html__( 'Description', 'elementor-filter-widget' ),
				'placeholder' => esc_html__( 'enter your description', 'elementor-filter-widget' ),
			]
		);
		
		$this->start_controls_tabs(
			'style_tabs'
		);

		// $this->add_control(
			// 'url',
			// [
				// 'label' => esc_html__( 'URL to embed', 'elementor-oembed-widget' ),
				// 'type' => \Elementor\Controls_Manager::TEXT,
				// 'input_type' => 'url',
				// 'placeholder' => esc_html__( 'https://your-link.com', 'elementor-oembed-widget' ),
			// ]
		// );
		
		

		$this->end_controls_section();
		
		$this->start_controls_section(
			'config_section',
			[
				'label' => esc_html__( 'Search', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				
			]
		);
		
			$this->add_control(
			'label-search',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'label search', 'elementor-filter-widget' ),
				'default' => esc_html__( 'Chercher un poste', 'elementor-filter-widget' ),
			]
		);
		
		$this->add_control(
			'label-place',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'label place', 'elementor-filter-widget' ),
				'default' => esc_html__( 'place', 'elementor-filter-widget' ),
			]
		);
		
		
		// $this->add_control(
			// 'select_poste_place',
			// [
				// 'type' => \Elementor\Controls_Manager::SELECT,
				// 'label' => esc_html__( 'Lightbox', 'elementor-filter-widget' ),
				// 'options' => [ ],
				// 'default' => 'no',
			// ]
		// );
		$this->add_control(
			'label-department',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'label department', 'elementor-filter-widget' ),
				'default' => esc_html__( 'Department', 'elementor-filter-widget' ),
			]
		);
		$this->add_control(
			'label-type-poste',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'label type poste', 'elementor-filter-widget' ),
				'default' => esc_html__( 'Type poste', 'elementor-filter-widget' ),
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'table_section',
			[
				'label' => esc_html__( 'Label title', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'label-title',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Label title', 'elementor-filter-widget' ),
				'default' => esc_html__( 'Title', 'elementor-filter-widget' ),
			]
		);
		
		$this->add_control(
			'label-tbloc',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Label location', 'elementor-filter-widget' ),
				'default' => esc_html__( 'Location', 'elementor-filter-widget' ),
			]
		);
		$this->add_control(
			'label-tbdep',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'label department', 'elementor-filter-widget' ),
				'default' => esc_html__( 'Department', 'elementor-filter-widget' ),
			]
		);
		$this->add_control(
			'label-tb-type-poste',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'label type poste', 'elementor-filter-widget' ),
				'default' => esc_html__( 'Type poste', 'elementor-filter-widget' ),
			]
		);
		
		
		
		$this->end_controls_section();
		

	}
	
	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		
		//get element
		$titre= $settings["filer-name"];
		$description= $settings["filter-description"];
		
		//get search
		$label_search= $settings["label-search"];
        $place= $settings["label-place"];
		$department= $settings["label-department"];
		$type_poste= $settings["label-type-poste"];
		
		//get table
		$tbtitle= $settings["label-title"];
		$Location= $settings["label-tbloc"];
		$tbdepartment= $settings["label-tbdep"];
		$tb_type_poste= $settings["label-tb-type-poste"];
		
		
		 // $args = array(
		   // 'public'   => true,
		   // '_builtin' => false
		// );
		 
		
		 
		// $post_types = get_post_types( $args, $output, $operator ); 
		//$options  => esc_html__( 'Solid', 'plugin-name' );
		 // $options="";
		      
			    //place
				
				// $argsplace = array(
				  // 'post_type'   => 'place',
				  // 'numberposts' => -1, 
				  // 'orderby'=> 'title', 
				  // 'order' => 'ASC'
				// );
				
				// $argsplace = get_posts( $argsplace );
				
				// department
				// $argsPartners = array(
				  // 'post_type'   => 'department',
				  // 'numberposts' => -1, 
				  // 'orderby'=> 'title', 
				  // 'order' => 'ASC'
				// );
				
				// $allPartners = get_posts( $argsPartners );
				
				// type post
				
				// $typepost = array(
				  // 'post_type'   => 'type_poste',
				  // 'numberposts' => -1, 
				  // 'orderby'=> 'title', 
				  // 'order' => 'ASC'
				// );
				
				// $typepost = get_posts( $typepost );
				
				//les offres
				
				$argsoffre = array(
			  'post_type'   => 'conference',
			  'numberposts' => -1, 
			  'orderby'=> 'date', 
			  'order' => 'ASC'
			);
			
			$alloffres = get_posts( $argsoffre );
			
			// echo "<pre>";
			// print_r($alloffres);
			
			
				
		 
	
		
		 
		
		?>
		<style>
			.bk-pos {
				width: 100%;
				padding: 5px;
			}
			.avanced-serch {
				display: flex;
				width: 100%;
				margin-bottom: 20px;
			}
		</style>
		<div class="suo-introdection">
				<h3 class="title"><?php echo $titre; ?></h3>
				<p class="desciption"><?php echo $description; ?></p>
		</div>
		
	
		
		
						
						
						
				
              
				<!--<button class="tablink" onclick="openPage('Home', this, 'red')" id="defaultOpen">Home</button>
				<button class="tablink" onclick="openPage('News', this, 'green')" >News</button>
				<button class="tablink" onclick="openPage('Contact', this, 'blue')">Contact</button>
				<button class="tablink" onclick="openPage('About', this, 'orange')">About</button>-->
				<div class="menutab">
				 <?php
				    $index=1;
				  foreach ( $alloffres as $key => $proj ) { 
				  
				    ?>
					
				    <button class="tablink <?php if($index == 1) echo 'activetab';  ?>" onclick="openPage('<?php echo "tab".$proj->ID; ?>', this, '#fff')"  <?php if($index == 1) echo 'id="defaultOpen"';  ?> ><?php echo $proj->post_title; ?></button>
				  <?php
				  
				     $index++;
				  }
				  
				  ?>
				  </div>
				   <?php
				    $index=1;
				  foreach ( $alloffres as $key => $proj ) { 
				  
				           $partnerFields = get_fields( $proj->ID);
						   $image = wp_get_attachment_image_src( get_post_thumbnail_id( $proj->ID ), 'single-post-thumbnail' );
						   
						   // echo "<pre>";
						   // print_r($image);
						   // echo $image[0];
				    ?>
					<div id="<?php echo "tab".$proj->ID; ?>" class="tabcontent">
					<div class="block-content">
					   <div class="image-post blk-divis">
					   <img src="<?php echo $image[0]; ?>" class="img-res-post"/>
					   </div>
					   <div class="contenu-tab blk-divis">
					  
					  <p><?php  echo $partnerFields["description"]; ?></p>
					  </div>
					</div>  
					</div>
				  <?php
				  
				     $index++;
				  }
				  
				  ?>


				<script>
				function openPage(pageName,elmnt,color) {
				  var i, tabcontent, tablinks;
				  tabcontent = document.getElementsByClassName("tabcontent");
				  for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				  }
				  tablinks = document.getElementsByClassName("tablink");
				  for (i = 0; i < tablinks.length; i++) {
					tablinks[i].style.backgroundColor = "";
				  }
				  document.getElementById(pageName).style.display = "block";
				  elmnt.style.backgroundColor = color;
				  
				  
				}

				// Get the element with id="defaultOpen" and click on it
				document.getElementById("defaultOpen").click();
			
				jQuery( document ).ready(function() {
					jQuery(".tablink").click(function(){
					    jQuery(".tablink").removeClass("activetab");
						jQuery(".tablink").attr("id","");
						jQuery(this).addClass("activetab");
					})
				});
				
				</script>


		
		
		<?php
		
			// get all partners 
				// $argsPartners = array(
				  // 'post_type'   => 'department',
				  // 'numberposts' => -1, 
				  // 'orderby'=> 'title', 
				  // 'order' => 'ASC'
				// );
				
		 // $allPartners = get_posts( $argsPartners );
		 
		 	
			
	
		

	}


	 
 }
 
 ?>
 
