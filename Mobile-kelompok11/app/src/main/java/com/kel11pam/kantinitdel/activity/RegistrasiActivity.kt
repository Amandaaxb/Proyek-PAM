package com.kel11pam.kantinitdel.activity

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import com.kel11pam.kantinitdel.MainActivity
import com.kel11pam.kantinitdel.R
import com.kel11pam.kantinitdel.app.ApiConfig
import com.kel11pam.kantinitdel.database.SharedPreferences
import com.kel11pam.kantinitdel.model.ResponUser
import kotlinx.android.synthetic.main.activity_registrasi.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class RegistrasiActivity : AppCompatActivity() {

    private lateinit var btnRegistrasi: Button
    private lateinit var edit_nama: EditText
    private lateinit var edit_email: EditText
    private lateinit var edit_notelp: EditText
    private lateinit var edit_password: EditText
    private lateinit var edit_ktp: EditText
    private lateinit var edit_username: EditText
    private lateinit var sp: SharedPreferences

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_registrasi)

        sp = SharedPreferences(this)

        btnRegistrasi = findViewById(R.id.btnRegisterRegistrasi)
        edit_nama = findViewById(R.id.edit_nama)
        edit_email = findViewById(R.id.edit_email)
        edit_notelp = findViewById(R.id.edit_notelp)
        edit_password = findViewById(R.id.edit_password)
        edit_ktp = findViewById(R.id.edit_ktp)
        edit_username = findViewById(R.id.edit_username)

        btnRegistrasi.setOnClickListener {
            registrasi()
        }

        btnGoogle.setOnClickListener{
            dataDummy()
        }
    }

    fun dataDummy(){
        edit_nama.setText("Kelompok11")
        edit_email.setText("User")
        edit_notelp.setText("user@gmail.com")
        edit_password.setText("password")
        edit_username.setText("082277881123")
        edit_ktp.setText("1111111111111111")
    }

    fun registrasi() {
        if (edit_ktp.text.isEmpty()) {
            edit_ktp.error = "Kolom Nomor KTP tidak boleh kosong"
            edit_ktp.requestFocus()
            return
        } else if (edit_ktp.text.length < 16) {
            edit_ktp.error = "Kolom Nomor KTP tidak boleh kurang"
            edit_ktp.requestFocus()
            return
        } else if (edit_nama.text.isEmpty()) {
            edit_nama.error = "Kolom Nama tidak boleh kosong"
            edit_nama.requestFocus()
            return
        } else if (edit_email.text.isEmpty()) {
            edit_email.error = "Kolom Email tidak boleh kosong"
            edit_email.requestFocus()
            return
        } else if (edit_notelp.text.length < 10) {
            edit_notelp.error = "Kolom Nomor Telepon tidak boleh kurang"
            edit_notelp.requestFocus()
            return
        } else if (edit_notelp.text.isEmpty()) {
            edit_notelp.error = "Kolom Nomor Telepon tidak boleh kosong"
            edit_notelp.requestFocus()
            return
        } else if (edit_password.text.isEmpty()) {
            edit_password.error = "Kolom Password tidak boleh kosong"
            edit_password.requestFocus()
            return
        }

        ApiConfig.instanceRetrofit.registrasi(edit_ktp.text.toString(), edit_nama.text.toString(), edit_username.text.toString(), edit_email.text.toString(), edit_notelp.text.toString(), edit_password.text.toString()).enqueue(object : Callback<ResponUser>{

            override fun onResponse(call: Call<ResponUser>, response: Response<ResponUser>) {
                val respons = response.body()!!
                if (respons.success == 1){
                    sp.setStatusLogin(true)
                    val intent = Intent(this@RegistrasiActivity, MainActivity::class.java)
                    intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP or Intent.FLAG_ACTIVITY_NEW_TASK)
                    startActivity(intent)
                    finish()
                    Toast.makeText(this@RegistrasiActivity, "Success: "+respons.message, Toast.LENGTH_SHORT).show()
                } else if(respons.success != 1) {
                    Toast.makeText(this@RegistrasiActivity, "Error: "+respons.message, Toast.LENGTH_SHORT).show()
                }
            }

            override fun onFailure(call: Call<ResponUser>, t: Throwable) {
                Toast.makeText(this@RegistrasiActivity, "Error: "+t.message, Toast.LENGTH_SHORT).show()
            }
        })
    }
}