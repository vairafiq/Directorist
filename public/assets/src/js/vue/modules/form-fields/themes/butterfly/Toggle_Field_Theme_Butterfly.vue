<template>
    <div class="cptm-form-group">
        <div class="atbdp-row">
            <div class="atbdp-col atbdp-col-4">
                <label :for="name">{{ label }}</label>
                <p class="cptm-form-group-info" v-if="description.length" v-html="description"></p>
            </div>
            
            <div class="atbdp-col atbdp-col-8">
                <div class="directorist_vertical-align-m">
                    <div class="directorist_item">
                        <span class="cptm-input-toggle" :class="toggleClass" @click="toggleValue()"></span>
                        <input type="checkbox" :id="name" :name="name" style="display: none;" v-model="local_value">
                    </div>

                    <div class="directorist_item">
                        <a 
                            class="cptm-btn cptm-btn-outline directorist_btn-start" 
                            v-if="compLinkIsEnable" 
                            :href="comp.link.url"
                            :target="comp.link.target"
                            :class="compLinkClass" 
                            v-html="comp.link.label">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <confirmation-modal v-bind="confirmation" @cancel="confirmationOnCancel()" />
    </div>
</template>

<script>
import toggle_feild from './../../../../mixins/form-fields/toggle-field';

export default {
    name: 'toggle-field-theme-butterfly',
    mixins: [ toggle_feild ],
}
</script>