<template>
    <RightNavbar/>
    <TopNavbar/>
    <LicenseShow/>
</template>
<script>
import RightNavbar from '../../components/UserProfile/RightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'
import LicenseShow from '../../components/License/LicenseShow'

export default {
    components : { RightNavbar , TopNavbar , LicenseShow} ,
    mounted(){
    }
}
</script>