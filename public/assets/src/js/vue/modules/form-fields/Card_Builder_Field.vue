<template>
  <div class="cptm-builder-section">
    <!-- cptm-preview-area -->
    <div class="cptm-preview-area">
      <div class="cptm-card-preview-widget">
        <!-- cptm-listing-card-preview-header -->
        <div class="cptm-listing-card-preview-header">
          <div class="cptm-card-preview-thumbnail">
            <div class="cptm-card-preview-thumbnail-overlay">
              
              <div class="cptm-card-preview-top-left">
                <!-- cptm-card-preview-top-left -->
                <card-widget-placeholder
                  containerClass="cptm-card-preview-top-left-placeholder"
                  :label="local_layout.thumbnail.top_left.label"
                  :availableWidgets="available_widgets"
                  :activeWidgets="active_widgets"
                  :acceptedWidgets="local_layout.thumbnail.top_left.acceptedWidgets"
                  :selectedWidgets="local_layout.thumbnail.top_left.selectedWidgets"
                  :maxWidget="local_layout.thumbnail.top_left.maxWidget"
                  :showWidgetsPickerWindow="getActiveInsertWindowStatus( 'thumbnail_top_left' )"
                  @insert-widget="insertWidget( $event, local_layout.thumbnail.top_left )"
                  @drag-widget="onDragStartWidget( $event,local_layout.thumbnail.top_left )"
                  @drag-end-widget="onDragEndWidget()"
                  @drop-on-placeholder="handleDropOnPlaceholder( local_layout.thumbnail.top_left )"
                  @edit-widget="editWidget( $event )"
                  @trash-widget="trashWidget( $event, local_layout.thumbnail.top_left )"
                  @open-widgets-picker-window="activeInsertWindow( 'thumbnail_top_left' )"
                  @close-widgets-picker-window="closeInsertWindow()"
                />
              </div>

              <!-- cptm-card-preview-top-rignt -->
              <div class="cptm-card-preview-top-rignt">
                <card-widget-placeholder
                  containerClass="cptm-card-preview-top-rignt-placeholder"
                  :label="local_layout.thumbnail.top_right.label"
                  :availableWidgets="available_widgets"
                  :activeWidgets="active_widgets"
                  :acceptedWidgets="local_layout.thumbnail.top_right.acceptedWidgets"
                  :selectedWidgets="local_layout.thumbnail.top_right.selectedWidgets"
                  :maxWidget="local_layout.thumbnail.top_right.maxWidget"
                  :showWidgetsPickerWindow="getActiveInsertWindowStatus( 'thumbnail_top_right' )"
                  @insert-widget="insertWidget( $event, local_layout.thumbnail.top_right )"
                  @drag-widget="onDragStartWidget( $event, local_layout.thumbnail.top_right )"
                  @drag-end-widget="onDragEndWidget()"
                  @drop-on-placeholder="handleDropOnPlaceholder( local_layout.thumbnail.top_right )"
                  @edit-widget="editWidget( $event )"
                  @trash-widget="trashWidget( $event, local_layout.thumbnail.top_right )"
                  @open-widgets-picker-window="activeInsertWindow( 'thumbnail_top_right' )"
                  @close-widgets-picker-window="closeInsertWindow()"
                />
              </div>

              <!-- cptm-card-preview-bottom-left -->
              <div class="cptm-card-preview-bottom-left">
                <card-widget-placeholder
                  containerClass="cptm-card-preview-bottom-left-placeholder"
                  :label="local_layout.thumbnail.bottom_left.label"
                  :availableWidgets="available_widgets"
                  :activeWidgets="active_widgets"
                  :acceptedWidgets="local_layout.thumbnail.bottom_left.acceptedWidgets"
                  :selectedWidgets="local_layout.thumbnail.bottom_left.selectedWidgets"
                  :maxWidget="local_layout.thumbnail.bottom_left.maxWidget"
                  :showWidgetsPickerWindow="getActiveInsertWindowStatus( 'thumbnail_bottom_left' )"
                  @insert-widget="insertWidget( $event, local_layout.thumbnail.bottom_left )"
                  @drag-widget="onDragStartWidget( $event, local_layout.thumbnail.bottom_left )"
                  @drag-end-widget="onDragEndWidget()"
                  @edit-widget="editWidget( $event )"
                  @trash-widget="trashWidget( $event, local_layout.thumbnail.bottom_left )"
                  @open-widgets-picker-window="activeInsertWindow( 'thumbnail_bottom_left' )"
                  @close-widgets-picker-window="closeInsertWindow()"
                />
              </div>

              <!-- cptm-card-preview-bottom-right -->
              <div class="cptm-card-preview-bottom-right">
                <card-widget-placeholder
                  containerClass="cptm-card-preview-bottom-right-placeholder"
                  :label="local_layout.thumbnail.bottom_right.label"
                  :availableWidgets="available_widgets"
                  :activeWidgets="active_widgets"
                  :acceptedWidgets="local_layout.thumbnail.bottom_right.acceptedWidgets"
                  :selectedWidgets="local_layout.thumbnail.bottom_right.selectedWidgets"
                  :maxWidget="local_layout.thumbnail.bottom_right.maxWidget"
                  :showWidgetsPickerWindow="getActiveInsertWindowStatus( 'thumbnail_bottom_right' )"
                  @insert-widget="insertWidget( $event, local_layout.thumbnail.bottom_right )"
                  @drag-widget="onDragStartWidget( $event, local_layout.thumbnail.bottom_right )"
                  @drag-end-widget="onDragEndWidget()"
                  @edit-widget="editWidget()"
                  @trash-widget="trashWidget( $event, local_layout.thumbnail.bottom_right )"
                  @open-widgets-picker-window="activeInsertWindow( 'thumbnail_bottom_right' )"
                  @close-widgets-picker-window="closeInsertWindow()"
                />
              </div>

              <div class="cptm-card-preview-thumbnail-bg">
                  <span class="uil uil-scenery"></span>
              </div>
            </div>
          </div>
        </div>

        <!-- cptm-listing-card-preview-body -->
        <div class="cptm-listing-card-preview-body">
          <!-- cptm-listing-card-author-avatar -->
          <div class="cptm-listing-card-author-avatar">
            <card-widget-placeholder
              containerClass="cptm-listing-card-author-avatar-placeholder"
              :label="local_layout.thumbnail.avater.label"
              :availableWidgets="available_widgets"
              :activeWidgets="active_widgets"
              :acceptedWidgets="local_layout.thumbnail.avater.acceptedWidgets"
              :selectedWidgets="local_layout.thumbnail.avater.selectedWidgets"
              :maxWidget="local_layout.thumbnail.avater.maxWidget"
              :showWidgetsPickerWindow="getActiveInsertWindowStatus( 'thumbnail_avater' )"
              @insert-widget="insertWidget( $event, local_layout.thumbnail.avater )"
              @drag-widget="onDragStartWidget( $event, local_layout.thumbnail.avater )"
              @drag-end-widget="onDragEndWidget()"
              @edit-widget="editWidget( $event )"
              @trash-widget="trashWidget( $event, local_layout.thumbnail.avater )"
              @open-widgets-picker-window="activeInsertWindow( 'thumbnail_avater' )"
              @close-widgets-picker-window="closeInsertWindow()"
            />
          </div>

          <card-widget-placeholder
            containerClass="cptm-listing-card-preview-body-placeholder"
            :label="local_layout.middle.body.label"
            :availableWidgets="available_widgets"
            :activeWidgets="active_widgets"
            :acceptedWidgets="local_layout.middle.body.acceptedWidgets"
            :selectedWidgets="local_layout.middle.body.selectedWidgets"
            :maxWidget="local_layout.middle.body.maxWidget"
            :showWidgetsPickerWindow="getActiveInsertWindowStatus( 'thumbnail_body_contents' )"
            @insert-widget="insertWidget( $event, local_layout.middle.body )"
            @drag-widget="onDragStartWidget( $event, local_layout.middle.body )"
            @drag-end-widget="onDragEndWidget()"
            @edit-widget="editWidget( $event )"
            @trash-widget="trashWidget( $event, local_layout.middle.body )"
            @open-widgets-picker-window="activeInsertWindow( 'thumbnail_body_contents' )"
            @close-widgets-picker-window="closeInsertWindow()"
          />
        </div>

        <!-- cptm-listing-card-preview-footer -->
        <div class="cptm-listing-card-preview-footer">
          <!-- cptm-listing-card-preview-footer-left-placeholder -->
          <card-widget-placeholder
            containerClass="cptm-listing-card-preview-footer-left-placeholder"
            :label="local_layout.footer.left.label"
            :availableWidgets="available_widgets"
            :activeWidgets="active_widgets"
            :acceptedWidgets="local_layout.footer.left.acceptedWidgets"
            :selectedWidgets="local_layout.footer.left.selectedWidgets"
            :maxWidget="local_layout.footer.left.maxWidget"
            :showWidgetsPickerWindow="getActiveInsertWindowStatus( 'thumbnail_footer_left' )"
            @insert-widget="insertWidget( $event, local_layout.footer.left )"
            @drag-widget="onDragStartWidget( $event, local_layout.footer.left )"
            @drag-end-widget="onDragEndWidget()"
            @edit-widget="editWidget( $event )"
            @trash-widget="trashWidget( $event, local_layout.footer.left )"
            @open-widgets-picker-window="activeInsertWindow( 'thumbnail_footer_left' )"
            @close-widgets-picker-window="closeInsertWindow()"
          />

          <!-- cptm-listing-card-preview-footer-right-placeholder -->
          <card-widget-placeholder
            containerClass="cptm-listing-card-preview-footer-right-placeholder"
            :label="local_layout.footer.right.label"
            :availableWidgets="available_widgets"
            :activeWidgets="active_widgets"
            :acceptedWidgets="local_layout.footer.right.acceptedWidgets"
            :selectedWidgets="local_layout.footer.right.selectedWidgets"
            :maxWidget="local_layout.footer.right.maxWidget"
            :showWidgetsPickerWindow="getActiveInsertWindowStatus( 'thumbnail_footer_right' )"
            @insert-widget="insertWidget( $event, local_layout.footer.right )"
            @drag-widget="onDragStartWidget( $event, local_layout.footer.right )"
            @drag-end-widget="onDragEndWidget()"
            @edit-widget="editWidget( $event )"
            @trash-widget="trashWidget( $event, local_layout.footer.right )"
            @open-widgets-picker-window="activeInsertWindow( 'thumbnail_footer_right' )"
            @close-widgets-picker-window="closeInsertWindow()"
          />
        </div>
      </div>
    </div>

    <div class="cptm-options-area">
      <options-window 
        :active="widgetOptionsWindowActiveStatus" 
        v-bind="widgetOptionsWindow" 
        @update="updateWidgetOptionsData( $event, widgetOptionsWindow )"
        @close="closeWidgetOptionsWindow()"
      />
    </div>
  </div>
</template>

<script>
import Vue from 'vue';

export default {
  name: "card-builder",
  props: {
    value: {
      required: false,
      default: null,
    },
    widgets: {
      required: false,
      default: null,
    },
    layout: {
      required: false,
      default: null,
    },
  },

  created() {
    this.init();
  },

  computed: {
    output_data() {
      let output = {};
      let layout = JSON.parse(JSON.stringify(this.layout));

      for (let section in layout) {
        output[section] = {};

        if (typeof layout[section] !== "object") {
          continue;
        }


        for (let section_area in layout[section]) {
          output[section][section_area] = [];

          if (typeof layout[section][section_area] !== "object") {
            continue;
          }
          if (typeof layout[section][section_area].selectedWidgets !== "object") {
            continue;
          }

          for (let widget in layout[section][section_area].selectedWidgets) {
            const widget_name = layout[section][section_area].selectedWidgets[widget];

            if (typeof this.active_widgets[widget_name] !== "object") {
              continue;
            }
            if (typeof this.active_widgets[widget_name].options !== "object") {
              continue;
            }

            let widget_options = this.active_widgets[widget_name].options.fields;
            let widget_options_data = {};

            if (typeof this.active_widgets[widget_name].type !== "undefined") {
              widget_options_data["type"] = this.active_widgets[
                widget_name
              ].type;
            }

            if (typeof this.active_widgets[widget_name].id !== "undefined") {
              widget_options_data["id"] = this.active_widgets[widget_name].id;
            }

            for (let option in widget_options) {
              widget_options_data[option] = widget_options[option].value;
            }

            output[section][section_area].push(widget_options_data);
          }
        }
      }

      return output;
    },

    widgetOptionsWindowActiveStatus() {
      if ( ! this.widgetOptionsWindow.widget.length ) { return false; }
      if ( typeof this.active_widgets[ this.widgetOptionsWindow.widget ] === 'undedined'  ) { return false; }

      return true;
    }
  },

  data() {
    return {
      active_insert_widget_key: '',

      // Widget Options Window
      widgetOptionsWindowDefault: {
        animation: 'cptm-animation-flip',
        widget: ''
      },

      widgetOptionsWindow: {
        animation: 'cptm-animation-flip',
        widget: ''
      },

      currentDraggingWidget: { origin: {}, key: '' },

      // Available Widgets
      available_widgets: {},

      // Active Widgets
      active_widgets: {},

      // Layout
      local_layout: {
        thumbnail: {
          top_right: {
            label: 'Top Right',
            selectedWidgets: [],
          },
          top_left: {
            label: 'Top Left',
            selectedWidgets: [],
          },
          bottom_right: {
            label: 'Bottom Right',
            selectedWidgets: [],
          },
          bottom_left: {
            label: 'Bottom Left',
            selectedWidgets: [],
          },
          avater: {
            label: 'Avater',
            selectedWidgets: [],
          },
        },

        middle: {
          body: {
            label: 'Body',
            selectedWidgets: [],
          },
        },

        footer: {
          right: {
            label: 'Footer Right',
            selectedWidgets: [],
          },
          left: {
            label: 'Footer Left',
            selectedWidgets: [],
          },
        },
      },
    };
  },

  methods: {
    init() {
      this.importWidgets();
      this.importLayout();
    },

    isTruthyObject( obj ) {
      if ( ! obj && typeof obj !== 'object' ) {
        return false;
      }

      return true;
    },

    importWidgets() {
      if ( ! this.isTruthyObject( this.widgets ) ) { return; }
      this.available_widgets = this.widgets;
    },

    importLayout() {
      if ( ! this.isTruthyObject( this.layout ) ) {
        return;
      }

      for ( let section in this.local_layout ) {
        
        if ( ! this.isTruthyObject( this.layout[ section ] ) ) {
          continue;
        }

        for ( let area in this.local_layout[ section ] ) {
          if ( ! this.isTruthyObject( this.layout[ section ][ area ] ) ) {
            continue;
          }

          Object.assign( this.local_layout[ section ][ area ], this.layout[ section ][ area ] );
        }
      }
    },

    onDragStartWidget( key, origin ) {
      this.currentDraggingWidget.key = key;
      this.currentDraggingWidget.origin = origin;

      console.log( 'onDragStartWidget', this.currentDraggingWidget );
    },

    onDragEndWidget() {
      this.currentDraggingWidget.key = '';
      this.currentDraggingWidget.origin = '';

      console.log( 'onDragEndWidget', this.currentDraggingWidget );
    },

    handleDropOnPlaceholder( where ) {
      console.log( 'handleDropOnPlaceholder', where );
    },

    editWidget( key ) {
      this.widgetOptionsWindow = { ...this.widgetOptionsWindowDefault, ...this.active_widgets[ key ].options };
      this.widgetOptionsWindow.widget = key;
    },

    updateWidgetOptionsData( data, widget ) {

      if ( typeof this.active_widgets[ widget.widget ] === 'undefined' ) {
        return;
      }

      this.active_widgets[ widget.widget ].fields = data;

      this.$emit( 'update', this.output_data );
    },

    closeWidgetOptionsWindow() {
      this.widgetOptionsWindow = this.widgetOptionsWindowDefault;
    },

    trashWidget( key, where ) {
      if ( ! where.selectedWidgets.includes( key ) ) { return; }
      
      let index = where.selectedWidgets.indexOf( key );
      Vue.delete( where.selectedWidgets, index);

      if ( typeof this.active_widgets[ key ] === 'undefined' ) { return; }
      Vue.delete( this.active_widgets, key);

      if ( key === this.widgetOptionsWindow.widget ) {
        this.closeWidgetOptionsWindow();
      }
    },

    activeInsertWindow( current_item_key ) {
      this.active_insert_widget_key = current_item_key;
    },

    insertWidget( payload, where ) {
      Vue.set( this.active_widgets, payload.key, { ...this.available_widgets[ payload.key ] } );
      Vue.set( where, 'selectedWidgets', payload.selected_widgets );
    },

    closeInsertWindow( widget_insert_window ) {
      this.active_insert_widget_key = '';
    },

    getActiveInsertWindowStatus( current_item_key ) {

      if ( current_item_key === this.active_insert_widget_key ) {
        return true;
      }

      return false;
    }
  },
};
</script>