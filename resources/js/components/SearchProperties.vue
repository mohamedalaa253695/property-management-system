

<template>
   <div class="form-group col-9">
        <label>property</label>
        <div id="the-basics">
            <input class="typeahead"  v-model="property"   type="text" placeholder="search by property number">
            <input type="hidden"  v-model="propertyId">
            <div class="tt-menu tt-open" v-show="properties">
                <div class="tt-dataset tt-dataset-states">
                    <div class="tt-suggestion tt-selectable" 
                        v-for="property in properties"
                        :key="property.id" 
                        :value="property.id"
                        @click="select(property)"
                     >
                     {{property.city_name}} - {{property.complex_name }} - {{property.building_number}} - {{property.property_number}} 
                     
                      </div>
                 
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios  from "axios";
import debounce from "lodash/debounce"
export default {
 name:"SearchProperties",

  data(){
        return{
            // invoiceNumber: null,
            property:null,
            properties:null,
            propertyId:null
            

        }
    },

    
    watch:{
      
          property:  debounce(function(){
                this.fetch();
                // console.log('triggered');
            },500)
    
        
    },
    methods:{
        async fetch(){
        const response  =  await axios.get('/properties/search' , {params:{property_number:this.property}});
        // this.properties = response.data;
        // console.log(response.data);
         response.data.length == 0 ? this.properties = null : this.properties = response.data;
        },

        select(property){
            this.property =  `${property.city_name} - ${property.complex_name} - ${property.building_number} - ${property.property_number}`;
            this.properties = null;
            this.propertyId = property.id;
            this.$emit('selected' , this.propertyId);
            console.log(this.propertyId);
        }
    }

}
</script>

<style>

</style>