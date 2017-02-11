<?php

 /**
  * Backend Class
  * Classe contenente metodi statici per le personalizzazione
  * delle funzionalit� di backend del tema
  *
  * @author Giampaolo Gasparro
  */
  class Backend {
 
    /**
     * Custom type Programmi
     */
	const TAXONOMY_PROGRAMMI = 'taxonomy_programmi';
	const TYPE_PROGRAMMI = 'programmi';
	const TYPE_PODCAST = 'podcast';
	const TYPE_NEWS = 'news';
	const TYPE_MULTIMEDIA = 'multimedia';
	const TYPE_STAFF = 'staff';
	const TYPE_SPEAKER = 'speaker';
	const META_KEY_METABOX_LOGO = 'metakey_logo';
	const META_KEY_METABOX_FACEBOOK = 'metakey_facebook';
	const META_KEY_METABOX_FEED = 'metakey_feed';
	const META_KEY_METABOX_PODCAST = 'metakey_podcast';
	const META_KEY_METABOX_STAFF = 'metakey_staff';
	const META_KEY_METABOX_SPEAKER = 'metakey_speaker';

    /**
     * Attribuisce le nuove funzionalit� a wordpress
     *
     * @return void
     */
    public static function init(){
      add_action( 'init', 'Backend::register_post_types', 0 );
	  add_action( 'init', 'Backend::register_taxonomies', 0 );
	  add_action( 'save_post', 'Backend::save_post');  
      add_action( 'delete_post', 'Backend::delete_post');  
      add_action( 'admin_init', 'Backend::add_metabox');
    }

     
      /**
       * Inizializza i metaboxes
       *
       * @return void
       */
      public static function add_metabox()
      {
	    add_meta_box( 'logo_metabox', 'Logo', 'Backend::logo_metabox', self::TYPE_PROGRAMMI, 'normal' );
		add_meta_box( 'facebook_metabox', 'Facebook', 'Backend::facebook_metabox', self::TYPE_PROGRAMMI, 'normal' );
		add_meta_box( 'feed_metabox', 'Feed', 'Backend::feed_metabox', self::TYPE_PROGRAMMI, 'normal' );
		add_meta_box( 'podcast_metabox', 'Podcast', 'Backend::podcast_metabox', self::TYPE_PODCAST, 'normal' );
		add_meta_box( 'staff_metabox', 'Staff', 'Backend::staff_metabox', self::TYPE_STAFF, 'normal' );
		add_meta_box( 'speaker_metabox', 'Speaker', 'Backend::speaker_metabox', self::TYPE_SPEAKER, 'normal' );
      }

	   /**
       * Metabox inserimento url podcast
       *
       * @return void
       */
      public static function podcast_metabox()
      {
          global $post;
          $meta_key = self::META_KEY_METABOX_PODCAST;
          $post_meta = get_post_meta($post->ID, $meta_key, true);
          $meta_values = json_decode($post_meta,true);

          /**
           * Variabili
           */
          $url_podcast = isset($meta_values['podcast']) ? $meta_values['podcast'] : '';

          
          ?>

          <div class="inside">

            <input type="hidden" name="<?php echo $meta_key;?>" value="" />

            <?php self::createNonce($meta_key); ?>

            <h2>Inserisci l'url del Podcast della trasmissione.</h2>
            <p><input id="<?php echo $meta_key;?>_podcast" name="<?php echo $meta_key;?>_podcast" style="width:600px;" value="<?php echo $url_podcast;?>" /></p>
			<p>
				<input type="submit" class="button button-highlighted" tabindex="4" value="Salva" id="save-post" name="save">
				<img alt="" id="draft-ajax-loading" class="ajax-loading" src="http://border-radio.it/wp-admin/images/wpspin_light.gif" style="visibility: hidden;">
            </p>
			<br><br>
			<h4>Ascolta Podcast</h4>
			<p>
			<object type="application/x-shockwave-flash" data="<?php bloginfo('template_directory'); ?>/player-podcast/dewplayer-vol.swf?mp3=<?php echo $url_podcast;?>" width="240" height="20" id="dewplayer-vol"><param name="wmode" value="transparent" /><param name="movie" value="<?php bloginfo('template_directory'); ?>/player-podcast/dewplayer-vol.swf?mp3=<?php echo $url_podcast;?>" /></object>
			</p>
            <div style="width:100%; clear:both;"></div>

          </div>
          <?php
      }
	  
       /**
       * Metabox per le gestione dell'inserimento logo 
       *
       * @return void
       */
      public static function logo_metabox()
      {
          global $post;
          $meta_key = self::META_KEY_METABOX_LOGO;
          $post_meta = get_post_meta($post->ID, $meta_key, true);
          $meta_values = json_decode($post_meta,true);

          /**
           * Variabili
           */
          $url_logo = isset($meta_values['logo']) ? $meta_values['logo'] : '';

          
          ?>

          <div class="inside">

            <input type="hidden" name="<?php echo $meta_key;?>" value="" />

            <?php self::createNonce($meta_key); ?>

            <h2>Inserisci l'url del Logo della trasmissione. (150x67) <a title="Aggiungi immagine" class="thickbox" id="add_image" href="media-upload.php?post_id=160&amp;type=image&amp;TB_iframe=1&amp;width=640&amp;height=458">Carica media</a></h2>
            <p><input id="<?php echo $meta_key;?>_logo" name="<?php echo $meta_key;?>_logo" style="width:600px;" value="<?php echo $url_logo;?>" /></p>
			<h4>Preview Logo</h4>
			<p><img height="67" width="150" src="<?php echo $url_logo;?>"></p>
            <div style="width:100%; clear:both;"></div>

          </div>
          <?php
      }
	  
	   /**
       * Metabox per le gestione dell'inserimento facebook 
       *
       * @return void
       */
      public static function facebook_metabox()
      {
          global $post;
          $meta_key = self::META_KEY_METABOX_FACEBOOK;
          $post_meta = get_post_meta($post->ID, $meta_key, true);
          $meta_values = json_decode($post_meta,true);

          /**
           * Variabili
           */
          $id_facebook = isset($meta_values['facebook']) ? $meta_values['facebook'] : '';

          
          ?>

          <div class="inside">

            <input type="hidden" name="<?php echo $meta_key;?>" value="" />

            <?php self::createNonce($meta_key); ?>

            <h2>Inserisci l'id Facebook della trasmissione.</h2>
            <p><input id="<?php echo $meta_key;?>_facebook" name="<?php echo $meta_key;?>_facebook" style="width:600px;" value="<?php echo $id_facebook;?>" /></p>
           <?php echo $id_facebook;?>
            <div style="width:100%; clear:both;"></div>

          </div>
          <?php
      }
	  
	   /**
       * Metabox per le gestione dell'inserimento Feed trasmissione 
       *
       * @return void
       */
      public static function feed_metabox()
      {
          global $post;
          $meta_key = self::META_KEY_METABOX_FEED;
          $post_meta = get_post_meta($post->ID, $meta_key, true);
          $meta_values = json_decode($post_meta,true);

          /**
           * Variabili
           */
          $url_feed = isset($meta_values['feed']) ? $meta_values['feed'] : '';

          
          ?>

          <div class="inside">

            <input type="hidden" name="<?php echo $meta_key;?>" value="" />

            <?php self::createNonce($meta_key); ?>

            <h2>Inserisci l'url del Feed della trasmissione.</h2>
            <p><input id="<?php echo $meta_key;?>_feed" name="<?php echo $meta_key;?>_feed" style="width:600px;" value="<?php echo $url_feed;?>" /></p>
			<?php echo $url_feed;?>
            <div style="width:100%; clear:both;"></div>

          </div>
          <?php
      }

	    /**
       * Metabox per le gestione dello speaker 
       *
       * @return void
       */
	   
      public static function speaker_metabox()
      {
          global $post;
          $contatto_meta_key = self::META_KEY_METABOX_SPEAKER.'_contatto';
          $foto_meta_key = self::META_KEY_METABOX_SPEAKER.'_foto';

          $post_meta = get_post_meta($post->ID, $contatto_meta_key, true);
          $meta_values = json_decode($post_meta,true);

          $post_meta = get_post_meta($post->ID, $foto_meta_key, true);
          $tmp_values = json_decode($post_meta,true);
          foreach($tmp_values as $key => $value) $meta_values[$key] = $value;

          /**
           * Variabili
           */
         
          $speaker_contatto = isset($meta_values['speaker_contatto']) ? $meta_values['speaker_contatto'] : '';
          $speaker_url_foto = isset($meta_values['speaker_foto']) ? $meta_values['speaker_foto'] : '';
          
          ?>

          <div class="inside">

            <input type="hidden" name="<?php echo $contatto_meta_key;?>" value="" />

            <?php self::createNonce('speaker'); ?>


            <h2>Inserisci l'indirizzo email dello speaker.</h2>
            <p><input id="<?php echo $contatto_meta_key;?>" name="<?php echo $contatto_meta_key;?>" style="width:600px;" value="<?php echo $speaker_contatto;?>" /></p>

            <h2>Inserisci l'url della foto dello speaker. (130x128) <a title="Aggiungi immagine" class="thickbox" id="add_image" href="media-upload.php?post_id=160&amp;type=image&amp;TB_iframe=1&amp;width=640&amp;height=458">Carica media</a></h2>
            <p><input id="<?php echo $foto_meta_key;?>_logo" name="<?php echo $foto_meta_key;?>" style="width:600px;" value="<?php echo $speaker_url_foto;?>" /></p>
            <h4>Preview foto</h4>
            <p><img height="130" width="128" src="<?php echo $speaker_url_foto;?>"></p>

            <div style="width:100%; clear:both;"></div>

          </div>
          <?php
      }
	  
	   /**
       * Metabox per le gestione dello staff 
       *
       * @return void
       */
	   
      public static function staff_metabox()
      {
          global $post;
          $ruolo_meta_key = self::META_KEY_METABOX_STAFF.'_ruolo';
          $contatto_meta_key = self::META_KEY_METABOX_STAFF.'_contatto';
          $foto_meta_key = self::META_KEY_METABOX_STAFF.'_foto';

          $post_meta = get_post_meta($post->ID, $ruolo_meta_key, true);
          $meta_values = json_decode($post_meta,true);

          $post_meta = get_post_meta($post->ID, $contatto_meta_key, true);
          $tmp_values = json_decode($post_meta,true);
          foreach($tmp_values as $key => $value) $meta_values[$key] = $value;

          $post_meta = get_post_meta($post->ID, $foto_meta_key, true);
          $tmp_values = json_decode($post_meta,true);
          foreach($tmp_values as $key => $value) $meta_values[$key] = $value;

          /**
           * Variabili
           */
          $staff_ruolo = isset($meta_values['staff_ruolo']) ? $meta_values['staff_ruolo'] : '';
          $staff_contatto = isset($meta_values['staff_contatto']) ? $meta_values['staff_contatto'] : '';
          $staff_url_foto = isset($meta_values['staff_foto']) ? $meta_values['staff_foto'] : '';
          
          ?>

          <div class="inside">

            <?php self::createNonce('staff'); ?>

            <h2>Inserisci il ruolo del membro dello staff.</h2>
            <p><input id="<?php echo $ruolo_meta_key;?>" name="<?php echo $ruolo_meta_key;?>" style="width:600px;" value="<?php echo $staff_ruolo;?>" /></p>
            <h2>Inserisci l'indirizzo email del membro dello staff.</h2>
            <p><input id="<?php echo $contatto_meta_key;?>" name="<?php echo $contatto_meta_key;?>" style="width:600px;" value="<?php echo $staff_contatto;?>" /></p>

            <h2>Inserisci l'url della foto del membro dello staff. (130x128) <a title="Aggiungi immagine" class="thickbox" id="add_image" href="media-upload.php?post_id=160&amp;type=image&amp;TB_iframe=1&amp;width=640&amp;height=458">Carica media</a></h2>
            <p><input id="<?php echo $foto_meta_key;?>_logo" name="<?php echo $foto_meta_key;?>" style="width:600px;" value="<?php echo $staff_url_foto;?>" /></p>
            <h4>Preview foto</h4>
            <p><img height="130" width="128" src="<?php echo $staff_url_foto;?>"></p>

            <div style="width:100%; clear:both;"></div>

          </div>
          <?php
      }

      /**
       * Salva il valore podcast sul DB
       *
       * @return void
       */
      protected static function _save_podcast_metabox()
      {
          global $post;
          $meta_key = self::META_KEY_METABOX_PODCAST; 

          if(isset($_POST) && isset($_POST[$meta_key])){

            self::verifyNonce($meta_key);

            $url_podcast = isset($_POST[$meta_key.'_podcast']) ? $_POST[$meta_key.'_podcast'] : '';
            $data = array(
              'podcast' => $url_podcast,
            );
            $json = json_encode($data);
			$del = delete_post_meta($post->ID, $meta_key);
            $add = add_post_meta($post->ID, $meta_key, $json);
          }
      }
	  
	  
       /**
       * Salva il valore logo sul DB
       *
       * @return void
       */
      protected static function _save_logo_metabox()
      {
          global $post;
          $meta_key = self::META_KEY_METABOX_LOGO; 

          if(isset($_POST) && isset($_POST[$meta_key])){

            self::verifyNonce($meta_key);

            $url_logo = isset($_POST[$meta_key.'_logo']) ? $_POST[$meta_key.'_logo'] : '';
            $data = array(
              'logo' => $url_logo,
            );
            $json = json_encode($data);
			$del = delete_post_meta($post->ID, $meta_key);
            $add = add_post_meta($post->ID, $meta_key, $json);
          }
      }
	  
	   /**
       * Salva il valore feed sul DB
       *
       * @return void
       */
      protected static function _save_feed_metabox()
      {
          global $post;
          $meta_key = self::META_KEY_METABOX_FEED; 

          if(isset($_POST) && isset($_POST[$meta_key])){

            self::verifyNonce($meta_key);

            $url_feed = isset($_POST[$meta_key.'_feed']) ? $_POST[$meta_key.'_feed'] : '';
            $data = array(
              'feed' => $url_feed,
            );
            $json = json_encode($data);
			$del = delete_post_meta($post->ID, $meta_key);
            $add = add_post_meta($post->ID, $meta_key, $json);
          }
      }

	   /**
       * Salva i dati del membro dello staff sul DB
       *
       * @return void
       */
      protected static function _save_staff_metabox()
      {
          global $post;
          $ruolo_meta_key = self::META_KEY_METABOX_STAFF.'_ruolo'; 
          $contatto_meta_key = self::META_KEY_METABOX_STAFF.'_contatto'; 
          $foto_meta_key = self::META_KEY_METABOX_STAFF.'_foto'; 

          if(isset($_POST) && isset($_POST[$ruolo_meta_key]) && isset($_POST[$contatto_meta_key]) && isset($_POST[$foto_meta_key])){

            self::verifyNonce('staff');

            $staff_ruolo = isset($_POST[$ruolo_meta_key]) ? $_POST[$ruolo_meta_key] : '';
            $data = array(
              'staff_ruolo' => $staff_ruolo
            );
            $json = json_encode($data);
            $del = delete_post_meta($post->ID, $ruolo_meta_key);
            $add = add_post_meta($post->ID, $ruolo_meta_key, $json);

            $staff_contatto = isset($_POST[$contatto_meta_key]) ? $_POST[$contatto_meta_key] : '';
            $data = array(
              'staff_contatto' => $staff_contatto
            );
            $json = json_encode($data);
            $del = delete_post_meta($post->ID, $contatto_meta_key);
            $add = add_post_meta($post->ID, $contatto_meta_key, $json);

            $staff_foto = isset($_POST[$foto_meta_key]) ? $_POST[$foto_meta_key] : '';
            $data = array(
              'staff_foto' => $staff_foto
            );
            $json = json_encode($data);
            $del = delete_post_meta($post->ID, $foto_meta_key);
            $add = add_post_meta($post->ID, $foto_meta_key, $json);
          }
      }

	   /**
       * Salva i dati dello speaker sul DB
       *
       * @return void
       */
      protected static function _save_speaker_metabox()
      {
          global $post;
          $contatto_meta_key = self::META_KEY_METABOX_SPEAKER.'_contatto'; 
          $foto_meta_key = self::META_KEY_METABOX_SPEAKER.'_foto'; 

          if(isset($_POST) && isset($_POST[$contatto_meta_key]) && isset($_POST[$foto_meta_key])){

            self::verifyNonce('speaker');

            $speaker_contatto = isset($_POST[$contatto_meta_key]) ? $_POST[$contatto_meta_key] : '';
            $data = array(
              'speaker_contatto' => $speaker_contatto
            );
            $json = json_encode($data);
            $del = delete_post_meta($post->ID, $contatto_meta_key);
            $add = add_post_meta($post->ID, $contatto_meta_key, $json);

            $speaker_foto = isset($_POST[$foto_meta_key]) ? $_POST[$foto_meta_key] : '';
            $data = array(
              'speaker_foto' => $speaker_foto
            );
            $json = json_encode($data);
            $del = delete_post_meta($post->ID, $foto_meta_key);
            $add = add_post_meta($post->ID, $foto_meta_key, $json);
          }
      }
	  
	   /**
       * Salva il valore id facebook sul DB
       *
       * @return void
       */
      protected static function _save_facebook_metabox()
      {
          global $post;
          $meta_key = self::META_KEY_METABOX_FACEBOOK; 

          if(isset($_POST) && isset($_POST[$meta_key])){

            self::verifyNonce($meta_key);

            $id_facebook = isset($_POST[$meta_key.'_facebook']) ? $_POST[$meta_key.'_facebook'] : '';
            $data = array(
              'facebook' => $id_facebook,
            );
            $json = json_encode($data);
            $del = delete_post_meta($post->ID, $meta_key);
            $add = add_post_meta($post->ID, $meta_key, $json);
          }
      }
	  
	    /**
       * Elimina il valore podcast sul DB
       *
       * @return void
       */
      protected static function _delete_podcast_metabox()
      {
          global $post;
          $meta_key = self::META_KEY_METABOX_PODCAST;
          delete_post_meta($post->ID, $meta_key);
      }
	  
	    /**
       * Elimina il dati del membro dello staff sul DB
       *
       * @return void
       */
      protected static function _delete_staff_metabox()
      {
          global $post;
          $meta_key = self::META_KEY_METABOX_STAFF.'_ruolo';
          delete_post_meta($post->ID, $meta_key);

          $meta_key = self::META_KEY_METABOX_STAFF.'_contatto';
          delete_post_meta($post->ID, $meta_key);

          $meta_key = self::META_KEY_METABOX_STAFF.'_foto';
          delete_post_meta($post->ID, $meta_key);
      }
	  
	    /**
       * Elimina i dati dello speaker sul DB
       *
       * @return void
       */
      protected static function _delete_speaker_metabox()
      {
          global $post;

          $meta_key = self::META_KEY_METABOX_SPEAKER.'_contatto';
          delete_post_meta($post->ID, $meta_key);

          $meta_key = self::META_KEY_METABOX_SPEAKER.'_foto';
          delete_post_meta($post->ID, $meta_key);
      }

      /**
       * Elimina il valore logo sul DB
       *
       * @return void
       */
      protected static function _delete_logo_metabox()
      {
          global $post;
          $meta_key = self::META_KEY_METABOX_LOGO;
          delete_post_meta($post->ID, $meta_key);
      }
	  
	   /**
       * Elimina il valore feed sul DB
       *
       * @return void
       */
      protected static function _delete_feed_metabox()
      {
          global $post;
          $meta_key = self::META_KEY_METABOX_FEED;
          delete_post_meta($post->ID, $meta_key);
      }
	  
	   /**
       * Elimina il valore id facebook sul DB
       *
       * @return void
       */
      protected static function _delete_facebook_metabox()
      {
          global $post;
          $meta_key = self::META_KEY_METABOX_FACEBOOK;
          delete_post_meta($post->ID, $meta_key);
      }


      /**
       * Restituisce output campo hidden con il nonce per il metakey passato
       *
       * @param string
       * @return void
       */
      protected static function createNonce($meta_key)
      {
          ?><input type="hidden" name="<?php echo $meta_key;?>_nonce" value="<?php echo wp_create_nonce($meta_key . '_nonce'); ?>" /><?php
      }

      /**
       * Verifica il nonce
       *
       * @param string
       * @param string
       * @return void
       */
      protected static function verifyNonce($meta_key,$method = 'POST')
      {
          $nonce = null;
          $noncename = $meta_key . "_nonce";

          switch($method):

              case 'POST':

                $nonce = isset($_POST[$noncename]) ? $_POST[$noncename] : '';

              break;

              case 'GET':

                $nonce = isset($_GET[$noncename]) ? $_GET[$noncename] : '';

              break;

          endswitch;

          if(null === $nonce) {

              die('Nonce ' . $meta_key . ' non valorizzato');

          } 

          if ( !wp_verify_nonce( $nonce, $noncename ) ) {  

              die('Nonce ' . $meta_key . ' non valido');  

          }
      }


       /**
       * Aggiunge delle logiche al salvataggio post
       *
       * @return void
       */
      public static function save_post()
      {
          self::_save_logo_metabox();
		  self::_save_facebook_metabox();
		  self::_save_feed_metabox();
		  self::_save_podcast_metabox();
		  self::_save_staff_metabox();
		   self::_save_speaker_metabox();
      }

      /**
       * Aggiunge delle logiche all'eliminazione post
       *
       * @return void
       */
      public static function delete_post()
      {
          self::_delete_logo_metabox();
		  self::_delete_facebook_metabox();
		  self::_delete_feed_metabox();
		  self::_delete_podcast_metabox();
		  self::_delete_staff_metabox();
		  self::_delete_speaker_metabox();
      }

     /**
     * Registra le tassonomie aggiuntive per il tema
     *
     * @return void
     */
    public static function register_taxonomies(){
	  	$labels = array(
			'name' => _x( 'Programmi', 'taxonomy general name' ),
			'singular_name' => _x( 'Programma', 'taxonomy singular name' ),
			'search_items' =>  __( 'Cerca in Programmi' ),
			'all_items' => __( 'Tutti i Programmi' ),
			'parent_item' => __( 'Programma parente' ),
			'parent_item_colon' => __( 'Programma parente' ),
			'edit_item' => __( 'Modifica Programmi' ), 
			'update_item' => __( 'Update Programmi' ),
			'add_new_item' => __( 'Aggiungi nuovo Programma' ),
			'new_item_name' => __( 'Nuovo Programma' ),
			'menu_name' => __( 'Tax Programmi' ),
	    ); 
		register_taxonomy(
			self::TAXONOMY_PROGRAMMI,
			array(
			  'programmi', 'podcast', 'speaker'
			),
			array(
			  'hierarchical' => true,
			  'labels' => $labels,
			  'show_ui' => true,
			  'query_var' => true,
			  'rewrite' => array( 'slug' => 'programmi-radio' )
			)
		);
    }


    /**
     * Registra i post type aggiuntivi per il tema
     *
     * @return void
     */
    public static function register_post_types(){
      
	  register_post_type(
        self::TYPE_PROGRAMMI,
        array(
			  'description' => 'Programmi custom post type',
			  'show_ui' => true,
			  'exclude_from_search' => false,
			  'labels' => array(
				  'name' => 'Programmi',
				  'singular_name' => 'Programma',
				  'add_new' => 'Aggiungi nuovo Programma',
				  'add_new_item' => 'Aggiungi nuovo Programma',
				  'edit' => 'Modifica Programma',
				  'edit_item' => 'Modifica Programma',
				  'new_item' => 'Nuovo Programma',
				  'view' => 'Guarda Programma',
				  'view_item' => 'Guarda Programma',
				  'search_items' => 'Cerca Programma',
				  'not_found' => 'Nessun Programma',
				  'not_found_in_trash' => 'Nessun Programma',
				  'parent_item_colon' => ''
                ),
				 'supports' => array('title', 'editor', 'thumbnail'),
				 'public' => true,
				 'capability_type' => 'programmi',
			     'publicly_queryable' => true,
				 'hierarchical' => true,
				 'rewrite' => array('slug' => 'programmi'),
			     'menu_position' => null,
				 'query_var' => true,
				 'taxonomies' => array('')
        )
      );
	   register_post_type(
        self::TYPE_PODCAST,
        array(
			  'description' => 'Podcast custom post type',
			  'show_ui' => true,
			  'exclude_from_search' => false,
			  'labels' => array(
				  'name' => 'Podcast',
				  'singular_name' => 'Podcast',
				  'add_new' => 'Aggiungi nuovo Podcast',
				  'add_new_item' => 'Aggiungi nuovo Podcast',
				  'edit' => 'Modifica Podcast',
				  'edit_item' => 'Modifica Podcast',
				  'new_item' => 'Nuovo Podcast',
				  'view' => 'Guarda Podcast',
				  'view_item' => 'Guarda Podcast',
				  'search_items' => 'Cerca Podcast',
				  'not_found' => 'Nessun Podcast',
				  'not_found_in_trash' => 'Nessun Podcast',
				  'parent_item_colon' => ''
                ),
				 'supports' => array('title', 'editor'),
				 'public' => true,
				 'capability_type' => 'podcast',
			     'publicly_queryable' => true,
				 'hierarchical' => true,
				 'rewrite' => array('slug' => 'podcast'),
			     'menu_position' => null,
				 'query_var' => true,
				 'taxonomies' => array('')
        )
      );
	   register_post_type(
        self::TYPE_STAFF,
        array(
			  'description' => 'Staff custom post type',
			  'show_ui' => true,
			  'exclude_from_search' => false,
			  'labels' => array(
				  'name' => 'Staff',
				  'singular_name' => 'Staff',
				  'add_new' => 'Aggiungi nuovo membro',
				  'add_new_item' => 'Aggiungi nuovo membro',
				  'edit' => 'Modifica membro',
				  'edit_item' => 'Modifica membro',
				  'new_item' => 'Nuovo membro',
				  'view' => 'Guarda membro',
				  'view_item' => 'Guarda membro',
				  'search_items' => 'Cerca membro',
				  'not_found' => 'Nessun membro',
				  'not_found_in_trash' => 'Nessun membro',
				  'parent_item_colon' => ''
                ),
				 'supports' => array('title', 'thumbnail'),
				 'public' => true,
				 'capability_type' => 'staff',
			     'publicly_queryable' => true,
				 'hierarchical' => true,
				 'rewrite' => array('slug' => 'staff'),
			     'menu_position' => null,
				 'query_var' => true,
				 'taxonomies' => array('post_tag')
        )
      );
	   register_post_type(
        self::TYPE_SPEAKER,
        array(
			  'description' => 'Speaker custom post type',
			  'show_ui' => true,
			  'exclude_from_search' => false,
			  'labels' => array(
				  'name' => 'Speaker',
				  'singular_name' => 'Speaker',
				  'add_new' => 'Aggiungi nuovo Speaker',
				  'add_new_item' => 'Aggiungi nuovo Speaker',
				  'edit' => 'Modifica Speaker',
				  'edit_item' => 'Modifica Speaker',
				  'new_item' => 'Nuovo Speaker',
				  'view' => 'Guarda Speaker',
				  'view_item' => 'Guarda Speaker',
				  'search_items' => 'Cerca Speaker',
				  'not_found' => 'Nessuno Speaker',
				  'not_found_in_trash' => 'Nessuno Speaker',
				  'parent_item_colon' => ''
                ),
				 'supports' => array('title', 'thumbnail'),
				 'public' => true,
				 'capability_type' => 'speaker',
			     'publicly_queryable' => true,
				 'hierarchical' => true,
				 'rewrite' => array('slug' => 'speaker'),
			     'menu_position' => null,
				 'query_var' => true,
				 'taxonomies' => ''
        )
      );
	   register_post_type(
        self::TYPE_NEWS,
        array(
			  'description' => 'News custom post type',
			  'show_ui' => true,
			  'exclude_from_search' => false,
			  'labels' => array(
				  'name' => 'News',
				  'singular_name' => 'News',
				  'add_new' => 'Aggiungi nuova News',
				  'add_new_item' => 'Aggiungi nuova News',
				  'edit' => 'Modifica News',
				  'edit_item' => 'Modifica News',
				  'new_item' => 'Nuova News',
				  'view' => 'Guarda News',
				  'view_item' => 'Guarda News',
				  'search_items' => 'Cerca News',
				  'not_found' => 'Nessuna News',
				  'not_found_in_trash' => 'Nessuna News',
				  'parent_item_colon' => ''
                ),
				 'supports' => array('title', 'editor', 'thumbnail'),
				 'public' => true,
				 'capability_type' => 'news',
			     'publicly_queryable' => true,
				 'hierarchical' => true,
				 'rewrite' => array('slug' => 'news'),
			     'menu_position' => null,
				 'query_var' => true,
				 'taxonomies' => array('post_tag')
        )
      );
	   register_post_type(
        self::TYPE_MULTIMEDIA,
        array(
			  'description' => 'Multimedia custom post type',
			  'show_ui' => true,
			  'exclude_from_search' => false,
			  'labels' => array(
				  'name' => 'Multimedia',
				  'singular_name' => 'Media',
				  'add_new' => 'Aggiungi nuovo Media',
				  'add_new_item' => 'Aggiungi nuovo Media',
				  'edit' => 'Modifica Media',
				  'edit_item' => 'Modifica Media',
				  'new_item' => 'Nuovo Media',
				  'view' => 'Guarda Media',
				  'view_item' => 'Guarda Media',
				  'search_items' => 'Cerca Media',
				  'not_found' => 'Nessun Media',
				  'not_found_in_trash' => 'Nessun Media',
				  'parent_item_colon' => ''
                ),
				 'supports' => array('title', 'editor', 'thumbnail'),
				 'public' => true,
				 'capability_type' => 'multimedia',
			     'publicly_queryable' => true,
				 'hierarchical' => true,
				 'rewrite' => array('slug' => 'multimedia'),
			     'menu_position' => null,
				 'query_var' => true,
				 'taxonomies' => array('post_tag', 'category')
        )
      );
    }

  }
  
  
