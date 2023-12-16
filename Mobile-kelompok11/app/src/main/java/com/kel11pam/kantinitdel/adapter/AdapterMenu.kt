package com.kel11pam.kantinitdel.adapter

import android.app.Activity
import android.content.Intent
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.TextView
import androidx.cardview.widget.CardView
import androidx.recyclerview.widget.RecyclerView
import com.google.gson.Gson
import com.kel11pam.kantinitdel.MainActivity
import com.kel11pam.kantinitdel.R
import com.kel11pam.kantinitdel.activity.DetailProdukActivity
import com.kel11pam.kantinitdel.activity.LoginActivity
import com.kel11pam.kantinitdel.model.Barang
import com.squareup.picasso.Picasso
import java.text.NumberFormat
import java.util.*
import kotlin.collections.ArrayList

class AdapterMenu(var activity: Activity, var data: ArrayList<Barang>): RecyclerView.Adapter<AdapterMenu.Holder>() {

    class Holder(view: View): RecyclerView.ViewHolder(view){
        val tvNama = view.findViewById<TextView>(R.id.tv_nama)
        val tvHarga = view.findViewById<TextView>(R.id.tv_harga)
        val imgGambar = view.findViewById<ImageView>(R.id.img_menu)
        val layout = view.findViewById<CardView>(R.id.layout)
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): Holder {
        val view: View = LayoutInflater.from(parent.context).inflate(R.layout.item_menu, parent, false)
        return Holder(view)
    }

    override fun onBindViewHolder(holder: Holder, position: Int) {
        holder.tvNama.text = data[position].nama_barang
        holder.tvHarga.text = NumberFormat.getCurrencyInstance(Locale("in", "ID")).format(Integer.valueOf(data[position].harga_barang))
//        holder.imgGambar.setImageResource(data[position].gambar)
        val image = "http://pamkel11.jarghost.site/storage/" + data[position].gambar
        Picasso.get()
            .load(image)
            .placeholder(R.drawable.ic_baseline_cloud_download_24)
            .error(R.drawable.ic_baseline_cloud_download_24)
            .resize(400,400)
            .into(holder.imgGambar)

        holder.layout.setOnClickListener {
            val acti = Intent(activity, DetailProdukActivity::class.java)
            val str = Gson().toJson(data[position], Barang::class.java)
            acti.putExtra("extra", str)
            activity.startActivity(acti)
        }

    }

    override fun getItemCount(): Int {
        return data.size
    }
}