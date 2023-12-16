package com.kel11pam.kantinitdel.activity

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Toast
import com.kel11pam.kantinitdel.MainActivity
import com.kel11pam.kantinitdel.R
import com.kel11pam.kantinitdel.app.ApiConfig
import com.kel11pam.kantinitdel.database.SharedPreferences
import com.kel11pam.kantinitdel.model.ResponUser
import kotlinx.android.synthetic.main.activity_login.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class LoginActivity : AppCompatActivity() {

    private lateinit var sp: SharedPreferences

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_login)

        sp = SharedPreferences(this)

        btnLoginLogin.setOnClickListener{
            login()
        }
    }

    fun login() {
        if (edit_emailLogin.text.isEmpty()) {
            edit_emailLogin.error = "Kolom email tidak boleh kosong"
            edit_emailLogin.requestFocus()
            return
        } else if (edit_passwordLogin.text.isEmpty()) {
            edit_passwordLogin.error = "Kolom password tidak boleh kosong"
            edit_passwordLogin.requestFocus()
            return
        }

        ApiConfig.instanceRetrofit.login(edit_emailLogin.text.toString(), edit_passwordLogin.text.toString()).enqueue(object : Callback<ResponUser> {
            override fun onResponse(call: Call<ResponUser>, response: Response<ResponUser>) {
                val respons = response.body()!!
                if (respons.success == 1){
                    sp.setStatusLogin(true)

//                    sp.setUser(respons.User)
                    sp.setString(sp.nama_lengkap, respons.nama_lengkap)
                    sp.setString(sp.nomor_hp, respons.nomor_hp)
                    sp.setString(sp.email, respons.email)

                    val intent = Intent(this@LoginActivity, MainActivity::class.java)
                    intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP or Intent.FLAG_ACTIVITY_NEW_TASK)
                    startActivity(intent)
                    finish()
                    Toast.makeText(this@LoginActivity, "Success "+respons.message, Toast.LENGTH_SHORT).show()
                } else {
                    Toast.makeText(this@LoginActivity, "Error: "+respons.message, Toast.LENGTH_SHORT).show()
                }
            }

            override fun onFailure(call: Call<ResponUser>, t: Throwable) {
                Toast.makeText(this@LoginActivity, "Error: "+t.message, Toast.LENGTH_SHORT).show()
            }
        })
    }
}