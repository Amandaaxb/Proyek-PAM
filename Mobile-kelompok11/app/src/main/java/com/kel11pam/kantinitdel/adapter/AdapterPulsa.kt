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
import com.kel11pam.kantinitdel.R
import com.kel11pam.kantinitdel.activity.DetailPulsaActivity
import com.kel11pam.kantinitdel.model.Pulsa
import com.squareup.picasso.Picasso
import java.text.NumberFormat
import java.util.*
import kotlin.collections.ArrayList

class AdapterPulsa(var activity: Activity, var data: ArrayList<Pulsa>): RecyclerView.Adapter<AdapterPulsa.Holder>() {

    class Holder(view: View): RecyclerView.ViewHolder(view){
        val tvNama = view.findViewById<TextView>(R.id.tv_nama)
        val tvHarga = view.findViewById<TextView>(R.id.tv_harga)
        val imgGambar = view.findViewById<ImageView>(R.id.img_menu)

        val layout1 = view.findViewById<CardView>(R.id.layout1)
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): Holder {
        val view: View = LayoutInflater.from(parent.context).inflate(R.layout.item_pulsa, parent, false)
        return Holder(view)
    }

    override fun onBindViewHolder(holder: Holder, position: Int) {
        holder.tvNama.text = data[position].nama_pulsa
        holder.tvHarga.text = NumberFormat.getCurrencyInstance(Locale("in", "ID")).format(Integer.valueOf(data[position].harga_pulsa))
//        holder.imgGambar.setImageResource(data[position].gambar)
        val img = "http://pamkel11.jarghost.site/storage/" + data[position].gambar
        Picasso.get()
            .load(img)
            .placeholder(R.drawable.ic_baseline_cloud_download_24)
            .error(R.drawable.ic_baseline_cloud_download_24)
            .resize(400,400)
            .into(holder.imgGambar)

        holder.layout1.setOnClickListener {
            val acti1 = Intent(activity, DetailPulsaActivity::class.java)
            val str1 = Gson().toJson(data[position], Pulsa::class.java)
            acti1.putExtra("pulsa", str1)
            activity.startActivity(acti1)
        }
    }

    override fun getItemCount(): Int {
        return data.size
    }
}