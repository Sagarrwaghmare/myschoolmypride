
<style>
.photos{
    flex-direction:row;
}
@media screen and (max-width: 1204px) {
    .photos {
        flex-direction:column;
  }
}
</style>

<section >
    <div class="hero">
        <img src="<?=base_url('assets/images/website-images/smiles4birthday_hero_wo_logo.jpg')?>" alt="">
    </div>
    <div class="about mx-4 my-4 space-y-2">
        <h2 class=" font-semibold text-3xl">Smiles4Birthday - Bringing Joy to Children</h2>
        <p  class=" text-gray-400">This initiative is dedicated to bringing joy and celebration into the lives of underprivileged children who have never experienced the simple delight of celebrating their birthdays. In many marginalized communities, birthdays often pass by unnoticed due to financial constraints or other challenging circumstances.</p>
        <p  class=" text-gray-400">CFTI organizes a small birthday party for these children with a cake, a set of new clothes and a gift of their choice. So this project not only commemorates the special day of each child but also infuses a sense of worth and significance into their lives. The festivities are more than just cakes, gifts, and balloons; they represent a recognition of each child's uniqueness and a reminder that they are seen, valued, and deserving of happiness.</p>
        
        <div class="photos flex  space-y-10 lg:space-y-0  justify-between items-center py-3">
            <img src="<?= base_url('assets/images/website-images/sfbd_banner_1.jpg')?>" alt="" style="max-width:380px;" class=" ">    
            <img src="<?= base_url('assets/images/website-images/sfbd_banner_2.jpg')?>" alt="" style="max-width:380px;" class=" ">

            <img src="<?= base_url('assets/images/website-images/sfbd_banner_3.jpg')?>" alt="" style="max-width:380px;" class=" ">
        </div>

        <!-- <button class="donate-btn bg-[#f5ab35] text-white py-3 px-3 rounded-[2px] w-[170px] h-[50px]">Donate Now</button> -->

    </div>
</section>