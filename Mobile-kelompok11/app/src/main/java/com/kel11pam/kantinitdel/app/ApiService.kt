package com.kel11pam.kantinitdel.app

import com.kel11pam.kantinitdel.model.ResponUser
import retrofit2.Call
import retrofit2.http.Field
import retrofit2.http.FormUrlEncoded
import retrofit2.http.GET
import retrofit2.http.POST

interface ApiService {
    @FormUrlEncoded
    @POST("registrasi") // "http://127.0.0.1:8000/api/registrasi"
    fun registrasi(
        @Field("nomor_ktp")nomorKtp:String,
        @Field("nama_lengkap") name:String,
        @Field("nomor_hp") nomor_hp:String,
        @Field("username") username:String,
        @Field("email") email:String,
        @Field("password") password:String,
    ):Call<ResponUser>

    @FormUrlEncoded
    @POST("login") // "http://127.0.0.1:8000/api/login"
    fun login(
        @Field("email") email:String,
        @Field("password") password:String
    ):Call<ResponUser>

    @GET("datakoperasi")
    fun getKoperasi():Call<ResponUser>

    @GET("pulsa")
    fun getPulsa():Call<ResponUser>
}