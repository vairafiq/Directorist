<template>
    <div class="cptm-form-group">
        <label v-if="( label.length )" :for="name">{{ label }}</label>
        <p class="cptm-form-group-info" v-if="description.length" v-html="description"></p>
        
        <div class="cptm-thumbnail">
            <div class="cptm-thumbnail-img-wrap" v-if="thumbnailSrc.length">
                <img :src="thumbnailSrc" class="cptm-thumbnail-img" width="100%" height="auto"/>

                <span v-if="hasThumbnail" class="cptm-thumbnail-action action-trash" @click="deleteThumbnail()">
                    <i class="uil uil-trash-alt"></i>
                </span>
            </div>

            <span v-if="! thumbnailSrc.length" class="cptm-thumbnail-placeholder">
                <span class="cptm-thumbnail-placeholder-icon">
                    <i class="uil uil-image"></i>
                </span>
            </span>
        </div>

        <input type="button" @click.prevent="openMediaPicker" class="cptm-btn cptm-btn-primary" :value="theButtonLabel">

        <form-field-validatior 
            :section-id="sectionId"
            :field-id="fieldId"
            :root="root"
            :value="value" 
            :rules="rules" 
            v-model="validationLog" 
            @validate="$emit( 'validate', $event )"
        />
    </div>
</template>

<script>
import image_feild from '../../../../mixins/form-fields/wp-media-picker-field';

export default {
    name: 'wp-media-picker-field-theme-default',
    mixins: [ image_feild ],
}
</script>