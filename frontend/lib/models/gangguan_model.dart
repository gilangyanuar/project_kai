class GangguanModel {
  int? gangguanId;
  int? masterId;
  String identitasKomponen;
  String bentukGangguan;
  String tindakLanjut;
  String? waktuLapor;

  GangguanModel({
    this.gangguanId,
    this.masterId,
    this.identitasKomponen = '',
    this.bentukGangguan = '',
    this.tindakLanjut = '',
    this.waktuLapor,
  });

  // ✅ Convert to JSON untuk API request
  Map<String, dynamic> toJson() {
    return {
      'identitas_komponen': identitasKomponen,
      'bentuk_gangguan': bentukGangguan,
      'tindak_lanjut': tindakLanjut,
    };
  }

  // ✅ Parse dari API response
  factory GangguanModel.fromJson(Map<String, dynamic> json) {
    return GangguanModel(
      gangguanId: json['gangguan_id'],
      masterId: json['master_id'],
      identitasKomponen: json['identitas_komponen'] ?? '',
      bentukGangguan: json['bentuk_gangguan'] ?? '',
      tindakLanjut: json['tindak_lanjut'] ?? '',
      waktuLapor: json['waktu_lapor'],
    );
  }

  // ✅ Validasi form
  bool isValid() {
    return identitasKomponen.isNotEmpty &&
        bentukGangguan.isNotEmpty &&
        tindakLanjut.isNotEmpty;
  }
}
