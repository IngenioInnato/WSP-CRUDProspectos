<?php get_header(); ?>
<div class="entry-content" id="form__section">
  <div id="et-boc" class="et-boc">
    <div class="et-l et-l--post">
      <div class="et_builder_inner_content et_pb_gutters3">
        <div class="et_pb_section et_pb_section_0 et_section_regular">
          <div class="et_pb_row et_pb_row_0">
            <h2>Prospectos</h2>
          </div>
          <div class="et_pb_row et_pb_row_0">
            <div
              class="et_pb_column et_pb_column_4_4 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough et-last-child">
              <div id="et_pb_contact_form_0"
                class="et_pb_module et_pb_contact_form_0 et_pb_contact_form_container clearfix"
                data-form_unique_num="0">
                <div class="et-pb-contact-message"></div>
                <div class="et_pb_contact">
                  <form class="et_pb_contact_form clearfix" onsubmit="(e) => e.preventDefault()">
                    <p class="et_pb_contact_field et_pb_contact_field_0 et_pb_contact_field_half">
                      <label for="nombre" class="et_pb_contact_form_label">Nombre</label>
                      <input type="text" id="nombre" class="input" value="" name="nombre" required placeholder="Nombre">
                    </p>
                    <p class="et_pb_contact_field et_pb_contact_field_1 et_pb_contact_field_half et_pb_contact_field_last">
                      <label for="email" class="et_pb_contact_form_label">E-mail</label>
                      <input type="text" id="email" class="input" value="" name="email" placeholder="E-mail">
                    </p>
                    <p class="et_pb_contact_field et_pb_contact_field_2 et_pb_contact_field_half">
                      <label for="tipo" class="et_pb_contact_form_label">Tipo</label>
                      <select id="tipo" class="et_pb_contact_select input" name="Tipo" required>
                        <option value="">Tipo</option>
                        <option value="Cliente">Cliente</option>
                        <option value="Consultor">Consultor</option>
                      </select>
                    </p>
                    <p class="et_pb_contact_field et_pb_contact_field_3 et_pb_contact_field_half et_pb_contact_field_last">
                      <label for="review" class="et_pb_contact_form_label">Review</label>
                      <input type="date" id="review" class="input" value="" name="review" required placeholder="Review">
                    </p>
                    <p class="et_pb_contact_field et_pb_contact_field_4 et_pb_contact_field_half" data-id="telefono"
                     >
                      <label for="telefono" class="et_pb_contact_form_label">Teléfono</label>
                      <input type="text" id="telefono" class="input" value="" name="telefono" required placeholder="Teléfono">
                    </p>
                    <p class="et_pb_contact_field et_pb_contact_field_5 et_pb_contact_field_half et_pb_contact_field_last">
                      <button id="send-prospect" type="submit" name="et_builder_submit_button" class="et_builder_submit_button et_pb_button">Añadir Prospecto</button>
                    </p>
                  </form>
                </div> <!-- .et_pb_contact -->
              </div> <!-- .et_pb_contact_form_container -->
            </div> <!-- .et_pb_column -->
          </div>
          <div class="et_pb_row et_pb_row_0" id="prospect__message" style="background: green;text-align: center;color: white;display:none;"><h5 style="padding: 0;color: #fff;">Añadido prospecto correctamente</h5>
          </div>
 <!-- .et_pb_row -->
        </div> <!-- .et_pb_section -->
      </div><!-- .et_builder_inner_content -->
    </div><!-- .et-l -->
  </div><!-- #et-boc -->
</div>
<style>
  /*
	Max width before this PARTICULAR table gets nasty. This query will take effect for any screen smaller than 760px and also iPads specifically.
	*/
	@media
	  only screen 
    and (max-width: 760px), (min-device-width: 768px) 
    and (max-device-width: 1024px)  {

		/* Force table to not be like tables anymore */
		table, thead, tbody, th, td, tr {
			display: block;
		}

		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr {
			position: absolute;
			top: -9999px;
			left: -9999px;
		}

    tr {
      margin: 0 0 1rem 0;
    }
      
    tr:nth-child(odd) {
      background: #ccc;
    }
    
		td {
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid #eee;
			position: relative;
			padding-left: 50%;
		}

		td:before {
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			top: 0;
			left: 6px;
			width: 45%;
			padding-right: 10px;
			white-space: nowrap;
		}

		/*
		Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
		*/
    td:before {
      position: relative;
    }
		td:nth-of-type(1):before { content: "Nombre: "; }
		td:nth-of-type(2):before { content: "E-mail: "; }
		td:nth-of-type(3):before { content: "Tipo: "; }
		td:nth-of-type(4):before { content: "Fecha: "; }
		td:nth-of-type(5):before { content: "Teléfono: "; }
		td:nth-of-type(6):before { content: "Acciones: "; }
	}
</style>
<div class="entry-content" id="table__section">
  <div id="et-boc" class="et-boc">
    <div class="et-l et-l--post">
      <div class="et_builder_inner_content et_pb_gutters3">
        <div class="et_pb_section et_pb_section_0 et_section_regular">
          <div class="et_pb_row et_pb_row_0">
            <h2>Lista de prospectos</h2>
          </div>
          <div class="et_pb_row et_pb_row_0">
            <div
              class="et_pb_column et_pb_column_4_4 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough et-last-child">
              <div id="et_pb_contact_form_0"
                class="et_pb_module et_pb_contact_form_0 et_pb_contact_form_container clearfix"
                data-form_unique_num="0">
                <div class="et-pb-contact-message"></div>
                <div class="et_pb_contact">
                  <table role="table" id="table">
                    <thead role="rowgroup">
                      <tr role="row">
                        <th role="columnheader">Nombre</th>
                        <th role="columnheader">E-mail</th>
                        <th role="columnheader">Tipo</th>
                        <th role="columnheader">Fecha</th>
                        <th role="columnheader">Teléfono</th>
                        <th role="columnheader">Acciones</th>
                      </tr>
                    </thead>
                    <tbody role="rowgroup" id="table__content">
                    </tbody>
                  </table>
                </div> <!-- .et_pb_contact -->
              </div> <!-- .et_pb_contact_form_container -->
            </div> <!-- .et_pb_column -->
          </div> <!-- .et_pb_row -->
        </div> <!-- .et_pb_section -->
      </div><!-- .et_builder_inner_content -->
    </div><!-- .et-l -->
  </div><!-- #et-boc -->
</div>
<?php get_footer(); ?>