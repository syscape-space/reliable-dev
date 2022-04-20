<template>
<div>
            <TopNavbar/>
<section class="tickets py-5">

            <div class="container">
                <div class="row">
 <div class="col-12 back mb-5 d-flex align-items-center justify-content-end"  >
                        <div class="row w-100 justify-content-end">
                            <div
                                class="col-xl-9 d-flex align-items-center justify-content-between"
                            >
                                <h4>تذاكري</h4>
                            </div>
                        </div>
                    </div>
    <RightNavbar/>

                        <div class="col-xl-9">
    <Ticket2/>

                    </div>
                </div>
            </div>
    </section>
</div>


</template>
<script>
import RightNavbar from '../../components/UserProfile/RightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'
import Ticket2 from '../../components/UserProfile/Ticket2.vue'

export default {
    components : { RightNavbar , TopNavbar , Ticket2} ,
    mounted(){
        if( localStorage.getItem("token") === "" ){
             this.$router.push({ name: "Login" });
         }
    }
}
</script>