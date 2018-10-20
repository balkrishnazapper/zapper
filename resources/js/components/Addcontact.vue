<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Add New Contact</h3>
                </div>
            </div>
            
             <form @submit.prevent="createContact();">
               <div class="jumbotron">
                 <h3>Basic Information</h3>
                 <div class="form-group row">
                  <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-4">
                        <select name="title" v-model="form.title" id="title" class="form-control" :class="{
                                            'is-invalid': form.errors.has('title') }">
                            <option value="">Select User Title</option>
                            <option value="mr">Mr.</option>
                            <option value="mrs">Mrs.</option>
                            <option value="ms">Ms.</option>
                        </select>
                        <has-error :form="form" field="title"></has-error>
                    </div>
                
                    <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.first_name" class="form-control" name="firstname" :class="{
                        'is-invalid': form.errors.has('first_name') }" id="inputFirstName" placeholder="Enter First Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputMiddleName" class="col-sm-2 col-form-label">Middle Name</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.middle_name" class="form-control" name="middlename" :class="{
                        'is-invalid': form.errors.has('middle_name') }" id="inputMiddleName" placeholder="Enter Middle Name">
                    </div>
                    <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.last_name" class="form-control" name="lastname" :class="{
                        'is-invalid': form.errors.has('last_name') }" id="inputLastName" placeholder="Enter Last Name">
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="inputHomePhone" class="col-sm-2 col-form-label">Home Phone</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.home_phone" class="form-control" name="homePhone" :class="{
                        'is-invalid': form.errors.has('home_phone') }" id="inputhome_phone" placeholder="Enter Home Phone">
                    </div>
                    <label for="inputLastNameMobileNumber" class="col-sm-2 col-form-label">Mobile Number</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.mobile_number" class="form-control" name="mobilenumber" :class="{
                        'is-invalid': form.errors.has('mobile_number') }" id="inputLastNameMobileNumber" placeholder="Enter Mobile Number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="seconderyPhone" class="col-sm-2 col-form-label">Secondery Phone</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.secondery_phone" class="form-control" name="seconderyphone" :class="{
                        'is-invalid': form.errors.has('secondery_phone') }" id="seconderyPhone" placeholder="Enter Secondery Phone">
                    </div>
                    <label for="inputSSN" class="col-sm-2 col-form-label">SSN Number</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.ssn" class="form-control" name="ssnnumber" :class="{
                        'is-invalid': form.errors.has('ssn') }" id="inputSSN" placeholder="Enter SSN Number">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="birthDate" class="col-sm-2 col-form-label">Birth Date</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.date_of_birth" class="form-control" name="birthdate" :class="{
                        'is-invalid': form.errors.has('date_of_birth') }" id="birthDate" placeholder="Select Birth-Date">
                    </div>
                    <label for="driverLicense" class="col-sm-2 col-form-label">Driving License Number</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.drivers_license" class="form-control" name="drivinglicense" :class="{
                        'is-invalid': form.errors.has('drivers_license') }" id="driverLicense" placeholder="Enter Driving License Number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="licenseState" class="col-sm-2 col-form-label">Drivers License State</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.drivers_license_state" class="form-control" name="driverlicensestate" :class="{
                        'is-invalid': form.errors.has('drivers_license_state') }" id="licenseState" placeholder="Enter Drivers License State">
                    </div>
                    <label for="contactImage" class="col-sm-2 col-form-label">Contact Image</label>
                    <div class="col-sm-4">
                         <input type="file"  id="contactImage" placeholder="Skills" name="contactimage" v.model="form.contact_image">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="primaryEmail" class="col-sm-2 col-form-label">Primary Email</label>
                    <div class="col-sm-4">
                         <input type="email" v-model="form.primary_email" class="form-control" name="primarymail" :class="{
                        'is-invalid': form.errors.has('primary_email') }" id="primaryEmail" placeholder="Select Primary Email">
                    </div>
                    <label for="seconderyEmail" class="col-sm-2 col-form-label">Secondery Email</label>
                    <div class="col-sm-4">
                         <input type="email" v-model="form.secondery_email" class="form-control" name="seconderymail" :class="{
                        'is-invalid': form.errors.has('secondery_email') }" id="seconderyEmail" placeholder="Enter Secondery Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bestTime" class="col-sm-2 col-form-label">Best Time</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.best_time" class="form-control" name="besttime" :class="{
                        'is-invalid': form.errors.has('best_time') }" id="bestTime" placeholder="Select Best Time">
                    </div>
                    <label for="bestDay" class="col-sm-2 col-form-label">Best Day</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.best_day" name="bestday" class="form-control" :class="{
                        'is-invalid': form.errors.has('best_day') }" id="bestDay" placeholder="Select best day for calling">
                    </div>
                </div>
               </div>
                <div class="jumbotron">
                    <h3>Mailing Address</h3>
                    <div class="form-group row">
                    <label for="bestTime" class="col-sm-2 col-form-label">Mailing Address</label>
                    <div class="col-sm-4">
                      <textarea v-model="form.mailing_street"  name="mailing_street"
                       placeholder="Address for Contact (Optional)" class="form-control" :class="{ 'is-invalid': form.errors.has('mailing_street') }"></textarea>
                      <has-error :form="form" field="mailing_street"></has-error>
                         
                    </div>
                    <label for="bestDay" class="col-sm-2 col-form-label">Mailing PO Box</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.mailing_po_box" name="mailingpo" class="form-control" :class="{
                        'is-invalid': form.errors.has('mailing_po_box') }" id="driverLicense" placeholder="Enter Mailing PO Box number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mailingcity" class="col-sm-2 col-form-label">Mailing City</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.mailing_city" class="form-control" name="mailingcity" :class="{
                        'is-invalid': form.errors.has('mailing_city') }" id="mailingcity" placeholder="Enter City Name">
                    </div>
                    <label for="mailingstate" class="col-sm-2 col-form-label">Mailing State</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.mailing_state" name="mailingstate" class="form-control" :class="{
                        'is-invalid': form.errors.has('mailing_state') }" id="mailingstate" placeholder="Enter State Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mailingzip" class="col-sm-2 col-form-label">Mailing Zip</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.mailing_zip" class="form-control" name="mailingzip" :class="{
                        'is-invalid': form.errors.has('mailing_zip') }" id="mailingzip" placeholder="Enter Zip Code">
                    </div>
                    <label for="mailingcountry" class="col-sm-2 col-form-label">Mailing Country</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.mailing_country" name="mailingcountry" class="form-control" :class="{
                        'is-invalid': form.errors.has('mailing_country') }" id="mailingcountry" placeholder="Enter Country Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ipaddress" class="col-sm-2 col-form-label">IP Address</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.ip_address" class="form-control" name="ipaddress" :class="{
                        'is-invalid': form.errors.has('ip_address') }" id="ipaddress" placeholder="Enter IP Address">
                    </div>
                    
                </div>
                </div>
                <div class="jumbotron">
                  <h3>Employer Information</h3>
                   <div class="form-group row">
                    <label for="employername" class="col-sm-2 col-form-label">Employer Name</label>
                    <div class="col-sm-4">
                      <input type="text" v-model="form.employer_name" class="form-control" name="employername" :class="{
                        'is-invalid': form.errors.has('employer_name') }" id="employername" placeholder="Enter Employer Name">
                         
                    </div>
                    <label for="jobtitle" class="col-sm-2 col-form-label">Job Title</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.job_title" name="jobtitle" class="form-control" :class="{
                        'is-invalid': form.errors.has('job_title') }" id="jobtitle" placeholder="Enter Job Title">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="officephone" class="col-sm-2 col-form-label">Office Phone</label>
                    <div class="col-sm-4">
                      <input type="text" v-model="form.office_phone" class="form-control" name="officephone" :class="{
                        'is-invalid': form.errors.has('office_phone') }" id="officephone" placeholder="Enter Office Phone Number">
                         
                    </div>
                    <label for="netmonthly" class="col-sm-2 col-form-label">Net Monthly Income</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.net_monthly_income" name="netmonthly" class="form-control" :class="{
                        'is-invalid': form.errors.has('net_monthly_income') }" id="netmonthly" placeholder="Enter Net Monthly Income">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="paymentcycle" class="col-sm-2 col-form-label">Payment Cycle</label>
                    <div class="col-sm-4">
                      <input type="text" v-model="form.payment_cycle" class="form-control" name="paymentcycle" :class="{
                        'is-invalid': form.errors.has('payment_cycle') }" id="paymentcycle" placeholder="Enter Payment Cycle">
                         
                    </div>
                    <label for="supervisor" class="col-sm-2 col-form-label">Supervisor</label>
                    <div class="col-sm-4">
                         <input type="text" v-model="form.supervisor" name="supervisor" class="form-control" :class="{
                        'is-invalid': form.errors.has('supervisor') }" id="supervisor" placeholder="Enter supervisor Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="employerid" class="col-sm-2 col-form-label">Employer Id</label>
                    <div class="col-sm-4">
                      <input type="text" v-model="form.employer_id" class="form-control" name="employerid" :class="{
                        'is-invalid': form.errors.has('employer_id') }" id="employerid" placeholder="Enter Employer Id">
                         
                    </div>
                </div>
                </div>
                <div class="jumbotron">
                  <h3>Bank Information</h3>
                  <div class="form-group row">
                    <label for="bankname" class="col-sm-2 col-form-label">Bank Name</label>
                    <div class="col-sm-4">
                      <input type="text" v-model="form.bank_name" class="form-control" name="bankname" :class="{
                        'is-invalid': form.errors.has('bank_name') }" id="bankname" placeholder="Enter Bank Name">
                         
                    </div>
                    <label for="accounttype" class="col-sm-2 col-form-label">Account Type</label>
                    <div class="col-sm-4">
                        
                        <select name="accounttype" v-model="form.account_type" id="accounttype" class="form-control" :class="{
                                            'is-invalid': form.errors.has('account_type') }">
                            <option value="">Select Account Type</option>
                            <option value="check">Check</option>
                            <option value="saving">Saving</option>
                        </select>
                        <has-error :form="form" field="title"></has-error>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="routingnumber" class="col-sm-2 col-form-label">Routing Number</label>
                    <div class="col-sm-4">
                      <input type="text" v-model="form.bank_name" class="form-control" name="routingnumber" :class="{
                        'is-invalid': form.errors.has('bank_name') }" id="routingnumber" placeholder="Enter Routing Number">
                         
                    </div>
                    <label for="acountnumber" class="col-sm-2 col-form-label">Account Number</label>
                    <div class="col-sm-4">
                      <input type="text" v-model="form.account_number" class="form-control" name="acountnumber" :class="{
                        'is-invalid': form.errors.has('account_number') }" id="acountnumber" placeholder="Enter Acount Number">
                         
                    </div>
                </div>
                </div>
                <div class="jumbotron">
                  <h3>Debit Collection</h3>
                  <div class="form-group row">
                    <label for="enrolleddate" class="col-sm-2 col-form-label">Enrolled Date</label>
                    <div class="col-sm-4">
                        <date-picker v-model="form.enrolled_date" lang="en" :not-before="new Date()"></date-picker>
                    </div>
                    <label for="sourcename" class="col-sm-2 col-form-label">Source</label>
                    <div class="col-sm-4">
                      <input type="text" v-model="form.source" class="form-control" name="sourcenumber" :class="{
                        'is-invalid': form.errors.has('source') }" id="sourcenumber" placeholder="Enter Source">
                         
                    </div>
                </div>
                <div class="form-group row">
                    <label for="acmanager" class="col-sm-2 col-form-label">Acount Manager</label>
                    <div class="col-sm-4">
                      <input type="text" v-model="form.acount_manager" class="form-control" name="acmanager" :class="{
                        'is-invalid': form.errors.has('acount_manager') }" id="acmanager" placeholder="Select Acount Manager">
                         
                    </div>
                    <label for="creditor" class="col-sm-2 col-form-label">Creditor</label>
                    <div class="col-sm-4">
                      <input type="text" v-model="form.creditor" class="form-control" name="creditor" :class="{
                        'is-invalid': form.errors.has('creditor') }" id="creditor" placeholder="Enter Creditor">
                         
                    </div>
                </div>
                <div class="form-group row">
                     <label for="pstatus" class="col-sm-2 col-form-label">Payment Status</label>
                    
                      
                    <div class="col-sm-4">
                      
                        <select name="pstatustype" v-model="form.payment_status_type" id="pstatustype" class="form-control" :class="{
                                            'is-invalid': form.errors.has('payment_status_type') }">
                            <option value="" selected disabled>Select Payment Frequency</option>
                            <option value="payment plan">Payment Plan</option>
                            <option value="documentation">Documentation</option>
                            <option value="settlement">Settlement</option>
                            <option value="bad">Bad</option>

                        </select>
                        <has-error :form="form" field="payment_status_type"></has-error>
                    </div>
                    
                    <label for="remark" class="col-sm-2 col-form-label">Remark</label>
                    <div class="col-sm-4">
                      <input type="text" v-model="form.remark" class="form-control" name="remark" :class="{
                        'is-invalid': form.errors.has('remark') }" id="remark" placeholder="Enter Remark">
                         
                    </div>
                </div>
                <div class="form-group row">
                    <label for="samount" class="col-sm-2 col-form-label">Total Settlement Amount</label>
                    <div class="col-sm-4">
                      <input type="text" v-model="form.settlement_amount" class="form-control" name="samount" :class="{
                        'is-invalid': form.errors.has('settlement_amount') }" id="samount" placeholder="Enter Settlement Amount">
                         
                    </div>
                   <label for="pfrequency" class="col-sm-2 col-form-label">Payment Frequency</label>
                    <div class="col-sm-4">
                      
                        <select name="pfrequency" v-model="form.payment_frequency" id="pfrequency" class="form-control" :value="form.payment_frequency" :class="{
                                            'is-invalid': form.errors.has('payment_frequency') }">
                            <option value="">Select Payment Frequency</option>
                            <option value="Weekly">Weekly</option>
                            <option value="Bi-Weekly">Bi-Weekly</option>
                            <option value="Half-Monthly">Half-Monthly</option>
                            <option value="Monthly">Monthly</option>
                        </select>
                        <has-error :form="form" field="payment_frequency"></has-error>
                    </div>
                    
                    </div>
                    <div class="form-group row">
                    <label for="iamount" class="col-sm-2 col-form-label">Installment Amount</label>
                    <div class="col-sm-4">
                      <input type="text" v-model="form.installment_amount" class="form-control" name="iamount" :class="{
                        'is-invalid': form.errors.has('installment_amount') }" id="iamount" placeholder="Enter Installment Amount">
                         
                    </div>
                    <label for="startdate" class="col-sm-2 col-form-label">Start Date</label>
                    <div class="col-sm-4">
                        <date-picker v-model="form.start_date" lang="en" @change="addInstallmentDetails" :value="form.start_date" :not-before="new Date()"></date-picker>
                    </div>
                    
                </div>
                    

                </div>
                <div class="jumbotron" >
                    <h3>Installment Data</h3>
                        <div v-for="(debitdetail, index) in debitdetails" v-bind:key="index">
                            <div class="form-group row">
                                <label for="iamount" class="col-sm-2 col-form-label">{{index + 1}} Installment Amount</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control"  :value="debitdetail.iamount" />
                                </div>
                                <label for="installmentdate" class="col-sm-2 col-form-label">{{index + 1}} Installment Date</label>
                                <div class="col-sm-4">
                                    <date-picker v-model="debitdetail.installmentdate" lang="en" :not-before="new Date()"></date-picker>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pmethod" class="col-sm-2 col-form-label">{{index + 1}} Installment Method</label>
                                <div class="col-sm-4">
                                    <select name="installmentmethod" v-model="debitdetail.installmentmethod" id="pmethod" class="form-control" :value="form.payment_frequency" :class="{
                                                        'is-invalid': form.errors.has('payment_method') }">
                                        <option value="" selected disabled>Select Payment Frequency</option>
                                        <option value="mo">Money Order</option>
                                        <option value="credit card">Credit Card</option>
                                        <option value="debit card">Debit Card</option>
                                        <option value="cheque">Cheque</option>
                                        <option value="wire">Wire</option>
                                    </select>
                                    
                                </div>
                                <label for="refnumber" class="col-sm-2 col-form-label">{{index + 1}} Reference Number</label>
                                <div class="col-sm-4">
                                    <input type="text" v-model="debitdetail.referencenumber" class="form-control" name="installmentreference"  id="refnumber" placeholder="Enter Reference Number">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="jumbotron">
                    
                </div>
            </form>
              
            
            
          </div>
        </div>
         
    </div>
</template>


//Script for add contact
<script>
import DatePicker from 'vue2-datepicker'
import Vue from 'vue';

export default {
    components: { DatePicker },
    data() {
        
        return {
          
          debitdetails: [],  
          editMode: false,
          users: {},
          form: new Form({ 
            id: "",
            contact_id: "",
            title: "",
            first_name: "",
            middle_name: "",
            last_name: "",
            email: "",
            home_phone: "",
            mobile_phone: "",
            secondery_phone: "",
            ssn: "",
            date_of_birth: "",
            drivers_license: "",
            drivers_license_state: "",
            primary_email: "",
            secondery_email: "",
            contact_image: "",
            best_time:"",
            best_day:"",
            mailing_street:"",
            mailing_po_box:"",
            mailing_city:"",
            mailing_state:"",
            mailing_zip:"",
            mailing_country:"",
            ip_address:"",
            employer_name:"",
            job_title:"",
            office_phone:"",
            net_monthly_income:"",
            payment_cycle:"",
            supervisor:"",
            employer_id:"",
            bank_name:"",
            account_type:"",
            account_number:"",
            enrolled_date:new Date(2018,10,16),
            source:"",
            acount_manager:"",
            creditor:"",
            settlement_amount:"",
            remark:"",
            payment_frequency:"",
            payment_status_type:"",
            start_date:"",
            
           }),
           
        }
    },
    methods: {
        addInstallmentDetails(){
            this.debitdetails.splice(0,this.debitdetails.length);
            var start_date = this.form.start_date;
           var payment_frequency = this.form.payment_frequency;
            var settlementAmount,installmentAmount;
            settlementAmount = this.form.settlement_amount;
            installmentAmount = this.form.installment_amount;
            var number_of_installments = parseInt(settlementAmount) / parseInt(installmentAmount);
            /**let checkEmptyLines = this.form.debitdetails.filter(line => form.debitdetails.number === null)
            if (checkEmptyLines.length >= 1 && this.form.debitdetails.length > 0) return*/
            var dates_of_installments= this.getiDates(start_date,number_of_installments,payment_frequency);
            
            for (var i = 1; i <= number_of_installments; i++) {
                if(i == 1){
                    this.insertItem(installmentAmount,start_date);
                } else {
                    this.insertItem(installmentAmount,dates_of_installments[i-2]);
                }
                
            }
        },

        insertItem(installmentAmount,installmentDate){
            
            this.debitdetails.push({
                iamount:installmentAmount,
                installmentdate:installmentDate,
                installmentmethod:"",
                referencenumber:""
            })
        },

        getiDates(start_date,number_of_installments,payment_frequency){
            var idates= new Array();
            var date = new Date(start_date);
            switch(payment_frequency) {
                case 'Weekly': 
                

                for (var i = 1; i < number_of_installments; i++) {

                        date.setDate(date.getDate() + 7);

                        var dd = date.getDate();
                        var mm = date.getMonth() + 1;
                        var y = date.getFullYear();
                        var someFormattedDate = mm + '-' + dd + '-' + y;
                        alert(someFormattedDate);
                        idates.push(someFormattedDate);
                    }
                    return idates;
                    break;
                case 'Bi-Weekly':
                for (var i = 1; i < number_of_installments; i++) {

                        date.setDate(date.getDate() + 14);

                        var dd = date.getDate();
                        var mm = date.getMonth() + 1;
                        var y = date.getFullYear();
                        var someFormattedDate = mm + '-' + dd + '-' + y;
                        alert(someFormattedDate);
                        idates.push(someFormattedDate);
                    }
                    return idates;
                    break;
                case 'Half-Monthly':
                 for (var i = 1; i < number_of_installments; i++) {

                        date.setDate(date.getDate() + 15);

                        var dd = date.getDate();
                        var mm = date.getMonth() + 1;
                        var y = date.getFullYear();
                        var someFormattedDate = mm + '-' + dd + '-' + y;
                        alert(someFormattedDate);
                        idates.push(someFormattedDate);
                    }
                    return idates;
                    break;
                default:
                var current 
                var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
                alert(lastDay);
                if(lastDay != date){
                     for (var i = 1; i < number_of_installments; i++) {
                            current = new Date(date.getFullYear(), date.getMonth()+1, date.getDate());
                            date = current;
                            var dd = current.getDate();
                            var mm = current.getMonth() + 1;
                            var y = current.getFullYear();
                            var someFormattedDate = mm + '-' + dd + '-' + y;
                            alert(someFormattedDate);
                            idates.push(someFormattedDate);
                        
                    }
                    return idates;
                } else {
                    
                    var m =  date.getMonth();
                    var y = date.getFullYear();
                    var last_date = new Date(y,m+1,1);
                    alert(last_date);
                    /*for (var i = 1; i < number_of_installments; i++) {
                          date.setMonth(date.setMonth() + 1);
                        current = new Date(date.getFullYear(), date.getMonth() + 1, 0);
                        date = current;
                        var dd = date.getDate();
                        var mm = date.getMonth() + 1;
                        var y = date.getFullYear();
                        var someFormattedDate = mm + '-' + dd + '-' + y;
                        alert(someFormattedDate);
                        idates.push(someFormattedDate);

                    }*/
                }
                return false;

                
                

            }
        }

    }
}
</script>
