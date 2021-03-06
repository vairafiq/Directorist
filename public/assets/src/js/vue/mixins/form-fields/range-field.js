import validator from './../validator';
import props from './input-field-props.js';

export default {
    mixins: [ props, validator ],
    model: {
        prop: 'value',
        event: 'input'
    },

    created() {
        this.range_value = this.value;
    },

    watch: {
        range_value() {
            this.$emit('update', this.range_value);
        }
    },

    computed: {
        formGroupClass() {
            return {
                ...this.validationClass,
                'cptm-mb-0': ( 'hidden' === this.input_type ) ? true : false,
            }
        },

        theMin() {
            return ( ! isNaN( this.min ) ) ? Number( this.min ) : 0;
        },

        theMax() {
            return ( ! isNaN( this.max ) ) ? Number( this.max ) : 100;
        },

        theStep() {
            return ( ! isNaN( this.step ) ) ? Number( this.step ) : 1;
        },

        rangeFillStyle() {
            let dif = this.theMin;
            let min = 0;
            let max = this.theMax - dif;
            let current_position = this.value - dif;

            let total = max - min;
            let p = current_position * 100 / total;
            
            return {
                width: p + '%'
            }
        }
    },

    data() {
        return {
            range_value: 0,
        }
    },

    methods: {
        isNumeric( data ) {
            if ( ! isNaN( number ) ) { return false; }
        }
    },
}