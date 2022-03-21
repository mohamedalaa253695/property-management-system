<template>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create Invoice</h4>
            <form
                class="forms-sample"
                method="POST"
                enctype="multipart/form-data"
                @submit.prevent="submit"
                action
            >
                <div class="form-group">
                    <label for="exampleInputUsername1">Invoice Number</label>
                    <input
                        type="text"
                        class="form-control"
                        name="invoice_number"
                        placeholder="invoice Number"
                        :value="invoiceNumber"
                        disabled
                    />
                </div>
                <div class="row">
                    <search-properties @selected="propertySelected"></search-properties>

                    <div class="form-group col-3">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" v-model="price" placeholder="price" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="CustomerName">Customer Name</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="customerName"
                            placeholder="Customer Name"
                        />
                    </div>
                    <div class="form-group col-6">
                        <label for="CustomerName">Customer Email</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="customerEmail"
                            placeholder="Customer Email"
                        />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="CustomerName">Customer Address</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="customerAddress"
                            placeholder="Customer Address"
                        />
                    </div>
                    <div class="form-group col-6">
                        <label for="CustomerName">Customer Phone</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="customerPhone"
                            placeholder="Customer Phone"
                        />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
// import axios from 'axios'
import SearchProperties from "./SearchProperties.vue"

export default {

    name: 'InvoiceCard',
    components: { SearchProperties },
    props: { invoiceNumber: String },

    data() {
        return {
            price: 0,
            customerName: null,
            customerEmail: null,
            customerAddress: null,
            customerPhone: null,
            propertyId: null,


        }
    },

    methods: {
        async submit() {
            const response = await axios.post('/invoices', {
                invoice_number: this.invoiceNumber,
                price: this.price,
                property_id: this.propertyId,
                customer_name: this.customerName,
                customer_email: this.customerEmail,
                customer_address: this.customerAddress,
                customer_phone: this.customerPhone,

            });
            // console.log(response);
            window.location.href= response.data;
        },
        propertySelected(propertyId) {
            this.propertyId = propertyId;
        }
    }




}





</script>

<style>
</style>