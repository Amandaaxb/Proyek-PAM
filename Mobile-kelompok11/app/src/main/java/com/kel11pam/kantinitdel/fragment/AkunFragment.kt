package com.kel11pam.kantinitdel.fragment

import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Button
import android.widget.TextView
import com.kel11pam.kantinitdel.R
import com.kel11pam.kantinitdel.database.SharedPreferences
import org.w3c.dom.Text


class AkunFragment : Fragment() {

    lateinit var sp:SharedPreferences
    lateinit var btnLogout:Button
    lateinit var tvNama : TextView
    lateinit var tvEmail : TextView
    lateinit var tvPhone : TextView

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {

        val view:View = inflater.inflate(R.layout.fragment_akun, container, false)
        init(view)

        sp = SharedPreferences(requireActivity())

        btnLogout.setOnClickListener{
            sp.setStatusLogin(false)
        }

        setData()


        return view
    }

    fun setData(){

//        val user = sp.getUser()

        tvNama.text = sp.getString(sp.nama_lengkap)
        tvEmail.text = sp.getString(sp.email)
        tvPhone.text = sp.getString(sp.nomor_hp)
    }

    private fun init(view: View){
        btnLogout = view.findViewById(R.id.btnLogout)
        tvNama = view.findViewById(R.id.text_nama)
        tvEmail = view.findViewById(R.id.text_email)
        tvPhone = view.findViewById(R.id.text_notelp)
    }

}
