<template>
<div>  
    <div class="content-wrapper ">
        <div class="row justify-content-center ">
            <div class="col-md-8 grid-margin stretch-card ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create City</h4>
                        <form class="forms-sample" @submit.prevent="submit">
                            
                                                                             
                            <div class="form-group">
                                <label for="exampleInputUsername1">property Status </label>
                                <select v-model="statusId" name="status" class="form-select">
                                    
                                        <option   value="0"> Select property Status</option>
                                        <option  v-for="status in statuses " :key="status.id" :value="status.id">
                                            {{status.name }}
                                        </option>
                                </select>
                            </div>

                  
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="from">From</label>
                                    <date-picker  v-model="from" valueType="format"></date-picker>
                                </div>
                                <div class="form-group col-6 d-flex">
                                    <label for="to">To</label>
                                    <date-picker v-model="to"   valueType="format"></date-picker>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

     <div class="container  " v-show="properties">
        <div class="row">
            <a class="w-auto margin-left-56" href="#" >
                <button  @click="generateReport()" class="btn btn-primary mb-3">export as pdf</button>
            </a>
        </div>

        <div class="align-self-left">
            <vue-html2pdf
                :show-layout="true"
                :float-layout="false"
                :enable-download="false"
                :preview-modal="true"
                :paginate-elements-by-height="1400"
                filename="properties-report"
                :pdf-quality="2"
                :manual-pagination="false"
                pdf-format="a4"
                pdf-orientation="landscape"
                pdf-content-width="auto"
        
                @progress="onProgress($event)"
                @hasStartedGeneration="hasStartedGeneration()"
                @hasGenerated="hasGenerated($event)"
                ref="html2Pdf"
            >
                <section slot="pdf-content">
                   <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Property Address</th>
                                            <th>Utilities</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                                <tr v-for="property in properties" :key="property.id">
                                                    <td>
                                                        {{property.country_name}}
                                                            - {{property.governorate_name}}
                                                            - {{property.city_name}} 
                                                            - {{property.complex_name}} 
                                                            - {{property.building_number }}
                                                            - {{property.property_number}} 
                                                    </td>
                                                    <td>
                                                        <li class="my-2">Number Of Balconies : {{property.number_of_balconies}}</li>
                                                        <li class="my-2">Number Of Bathrooms : {{property.number_of_bathrooms}}</li>
                                                        <li class="my-2">number of bedrooms : {{property.number_of_bedrooms}}</li>
                                                        <li class="my-2">Total Space : {{property.total_space}}</li>
                                                        <li class="my-2">price : {{property.price}}</li>
                                                        <li class="my-2">Property Description : {{property.property_description}}</li>
                                                    </td>                                   
                                                </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </vue-html2pdf>
        </div>
      
    </div> 
</div>

    
</template>

<script>
import axios from "axios";

import VueHtml2pdf from 'vue-html2pdf'

  import DatePicker from 'vue2-datepicker';
  import 'vue2-datepicker/index.css';


export default {
    name:"ReportComponent",
     components: { DatePicker,VueHtml2pdf },

    data(){
        return{
            statuses : [],
            from : null,
            to : null,
            statusId: "0",
            properties:null
           
        }
    },

    methods:{
           async submit() {
          const response =   await axios.post('/reports/search' ,{
                statusId : this.statusId,
                from : this.from,
                to: this.to
            });
            this.properties = response.data;
            console.log(this.properties);
        },
         generateReport () {
            this.$refs.html2Pdf.generatePdf()
        }
    },
   async  mounted(){
        
            const {data} = await axios.get('/statuses/json');
            this.statuses = data;    

    }


}


</script>


<style>
.margin-left-56{
    margin-left:56px ;
}
</style>