package com.kel11pam.kantinitdel.activity

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.google.gson.Gson
import com.kel11pam.kantinitdel.R
import com.kel11pam.kantinitdel.adapter.AdapterMenu
import com.kel11pam.kantinitdel.app.ApiConfig
import com.kel11pam.kantinitdel.model.Barang
import com.kel11pam.kantinitdel.model.ResponUser
import com.squareup.picasso.Picasso
import kotlinx.android.synthetic.main.activity_detail_produk.*
import kotlinx.android.synthetic.main.item_menu.*
import kotlinx.android.synthetic.main.item_menu.tv_harga
import kotlinx.android.synthetic.main.item_menu.tv_nama
import kotlinx.android.synthetic.main.toolbar_custom.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.text.NumberFormat
import java.util.*

class DetailProdukActivity : AppCompatActivity() {


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_detail_produk)

        getInfo()

    }

    fun getInfo(){
        val data = intent.getStringExtra("extra")
        val barang = Gson().fromJson<Barang>(data, Barang::class.java)

        tv_nama.text = barang.nama_barang
        tv_harga.text = NumberFormat.getCurrencyInstance(Locale("in", "ID")).format(Integer.valueOf(barang.harga_barang))
        des_kode.text = barang.kode_barang
        des_produk.text = barang.jenis_barang
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
        supportActionBar!!.title = barang.nama_barang
        supportActionBar!!.setDisplayHomeAsUpEnabled(true)
        supportActionBar!!.setDisplayHomeAsUpEnabled(true)
    }

    override fun onSupportNavigateUp(): Boolean {
        onBackPressed()
        return super.onSupportNavigateUp()
    }



}