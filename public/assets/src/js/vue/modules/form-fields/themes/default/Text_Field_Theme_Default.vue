<template>
    <div class="cptm-form-group" :class="formGroupClass">
        <label v-if="( 'hidden' !== input_type && label.length )" :for="name">{{ label }}</label>
        <p class="cptm-form-group-info" v-if="description.length" v-html="description"></p>
        
        <input class="cptm-form-control" :class="formControlClass" v-if="! valueShouldStringify" :type="input_type" :value="value" :placeholder="placeholder" @input="$emit('update', $event.target.value)">
        <input v-if="valueShouldStringify" type="hidden" :value="JSON.stringify( value )">

        <div class="cptm-form-group-feedback" v-if="validationMessages">
            <div class="cptm-form-alert" :class="'cptm-' + validationMessages.type">
                {{ validationMessages.message }}
            </div>
        </div>
    </div>
</template>

<script>
import text_feild from './../../../../mixins/form-fields/text-field';

export default {
    name: 'text-field-theme-default',
    mixins: [ text_feild ],
}
</script>