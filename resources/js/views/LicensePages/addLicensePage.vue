<template>
     <TopNavbar/>
<RightNavbar/>
   
    <AddLicense/>
</template>
<script>
import RightNavbar from '../../components/UserProfile/RightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'
import AddLicense from '../../components/License/AddLicense'

export default {
    components : { RightNavbar , TopNavbar , AddLicense} ,
    mounted(){
    }
}
</script>