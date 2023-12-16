package com.kel11pam.kantinitdel.database

import android.app.Activity
import android.content.Context
import android.content.SharedPreferences
import com.google.gson.Gson
import com.kel11pam.kantinitdel.model.User

class SharedPreferences(activity: Activity){
    val mypref = "MAIN_PRF"
    val sp:SharedPreferences
    val statusLogin = "Login"
    val nama_lengkap = "nama"
    val email = "email"
    val nomor_hp = "phone"



    val user = "user"

    init {
        sp = activity.getSharedPreferences(mypref, Context.MODE_PRIVATE)
    }

    fun setStatusLogin(status:Boolean){
        sp.edit().putBoolean(statusLogin, status).apply()
    }

    fun getStatusLogin():Boolean{
        return sp.getBoolean(statusLogin, false)
    }

    fun setUser(value: User){
        val data = Gson().toJson(value, User::class.java)
        sp.edit().putString(user, data).apply()
    }

    fun getUser() : User? {
        val data = sp.getString(user, null) ?: return null
        return Gson().fromJson<User>(data, User::class.java)
    }

    fun setString(key: String, value: String) {
        sp.edit().putString(key, value).apply()
    }

    fun getString(key: String): String? {
        return sp.getString(key, "")!!
    }

}