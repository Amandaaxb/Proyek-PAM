package com.kel11pam.kantinitdel.activity

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.google.gson.Gson
import com.kel11pam.kantinitdel.R
import com.kel11pam.kantinitdel.model.Barang
import com.kel11pam.kantinitdel.model.Pulsa
import com.squareup.picasso.Picasso
import kotlinx.android.synthetic.main.activity_detail_produk.*
import kotlinx.android.synthetic.main.item_menu.*
import kotlinx.android.synthetic.main.item_menu.tv_harga
import kotlinx.android.synthetic.main.item_menu.tv_nama
import kotlinx.android.synthetic.main.toolbar_custom.*
import java.text.NumberFormat
import java.util.*

class DetailPulsaActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_detail_pulsa)

        getInfo()
    }
    fun getInfo(){
        val data = intent.getStringExtra("pulsa")
        val barang = Gson().fromJson<Pulsa>(data, Pulsa::class.java)

        tv_nama.text = barang.nama_pulsa
        tv_harga.text = NumberFormat.getCurrencyInstance(Locale("in", "ID")).format(Integer.valueOf(barang.harga_pulsa))
        des_kode.text = barang.kode_pulsa
        des_produk.text = barang.jenis_pulsa
        des_stok.text = barang.stok
        val img = "http://pamkel11.jarghost.site/storage/" + barang.gambar
        Picasso.get()
            .load(img)
            .placeholder(R.drawable.ic_baseline_cloud_download_24)
            .error(R.drawable.ic_baseline_cloud_download_24)
            .resize(400,400)
            .into(image)

        //set Toolbar
        setSupportActionBar(toolbar)
        supportActionBar!!.title = barang.nama_pulsa
        supportActionBar!!.setDisplayHomeAsUpEnabled(true)
        supportActionBar!!.setDisplayHomeAsUpEnabled(true)

    }

    override fun onSupportNavigateUp(): Boolean {
        onBackPressed()
        return super.onSupportNavigateUp()
    }
}