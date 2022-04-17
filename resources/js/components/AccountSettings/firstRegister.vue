<template>
    <div class="">
        <div class="wrap text-center mt-4">
            <div class="row" style="row-gap:40px">
                <div class="col-md-4 part">
                    <div class="parent_all">
                        
                        <img v-if="first_choice =='user'" style="width: 20%;object-fit:contain" src="../../assets/images/logo-active.png" alt="">
                        <img v-else style="width: 20%;object-fit:contain" src="../../assets/images/logo-inactive.png" alt="">
                        <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص</p>
                        <div class="first_group">
                            <label>عميل</label>
                            <input v-model="first_choice" type="radio" value="user" name="first-choice" />
                        </div>
                        <div class="last_group">
                            <div class="group">
                                <label>افراد</label>
                                <input type="radio" name="person-choice" />
                            </div>
                            <div class="group">
                                <label>شركه</label>
                                <input type="radio" name="person-choice" />
                            </div>
                            <div class="group">
                                <label>جهة حكومية</label>
                                <input type="radio" name="person-choice" />
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="col-md-4 part">
                    <div class="parent_all">
                                                <img v-if="first_choice =='vendor'" style="width: 20%;object-fit:contain" src="../../assets/images/logo-active.png" alt="">
                        <img v-else style="width: 20%;object-fit:contain" src="../../assets/images/logo-inactive.png" alt="">
                        <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص</p>
                        <div class="first_group">
                            <label>مقدم خدمة</label>
                            <input v-model="first_choice" type="radio" value="vendor" name="first-choice" />
                        </div>
                        <div class="last_group">
                            <div class="group">
                                <label>افراد</label>
                                <input type="radio" name="service-choice" />
                            </div>
                            <div class="group">
                                <label>شركه</label>
                                <input type="radio" name="service-choice" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 part">
                    <div class="parent_all">
                                                <img v-if="first_choice =='judger'" style="width: 20%;object-fit:contain" src="../../assets/images/logo-active.png" alt="">
                        <img v-else style="width: 20%;object-fit:contain" src="../../assets/images/logo-inactive.png" alt="">
                        <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص</p>
                        <div class="first_group">
                            <label>محكم</label>
                            <input v-model="first_choice" type="radio" value="judger" name="first-choice" />
                        </div>
                        <div class="last_group">
                            <div class="group">
                                <label>افراد</label>
                                <input type="radio" name="judger-choice" />
                            </div>
                            <div class="group">
                                <label>شركه</label>
                                <input type="radio" name="judger-choice" />
                            </div>
                            <div class="group">
                                <label>شركه</label>
                                <input type="radio" name="judger-choice" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 d-flex justify-content-center">
                <button class="submit"> 
                    <router-link :to="{name:'Register', query:{'type':first_choice}}"
                      href="#"
                      style="color: #fff;text-decoration:none"  
                    class="" > التالي  </router-link></button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            first_choice:'user',
            logo_active:'active',
            logo_inactive:'inactive'
        }
    },
    watch:{
        'first_choice'(val){
            if(val == 'user'){
                this.logo_active = 'active'
                this.logo_inactive = 'inactive'
            }else{
                this.logo_active = 'inactive'
                this.logo_inactive = 'active'
            }
        }
    }
    
}
</script>
<style>
.wrap  {
    display:flex;
    flex-direction:column;

}
.part {
    border-left: 1px solid #eee;
}
.parent_all {
    display:flex;
    align-items:center;
    flex-direction:column;
    row-gap:25px;
}
.parent_all p{
    max-width:400px;
    width:100%;
    margin:auto;
    color:#4E5567;
}
.parent_all .first_group{
    display:flex;
    align-items:center;
    flex-direction:column;
    row-gap:10px;
}
.parent_all .last_group{
    display:flex;
    align-items:center;
    flex-direction:column;
    row-gap:10px;
}
.parent_all .last_group .group{
    position:relative;
    border:1px solid #ddd;
    border-radius:15px;
    padding: 10px;
    width:200px;
    background:white;
}
.parent_all .last_group .group input{
    position:absolute;
    top:50%;
    right:15px;
    transform:translateY(-50%);
}
.parent_all .last_group .group label{
    color:#4E5567;
}

.submit {
    border: 0;
    padding: 10px 20px;
    background: #028e80;
    border-radius: 5px;
    color: white;
    width: 100px;
    outline:none;
}

</style>